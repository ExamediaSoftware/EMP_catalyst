<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\FormChecklist;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;


class ApplicationFormVideo extends Component
{
    use WithFileUploads;

    public $video;
    public $video_path;
    public $application;

    public function mount($application)
    {
        $this->application = $application;
        $media_InterviewVid = Get_Media($application->id, 'interview video');

        $this->video_path = $media_InterviewVid->media_path ?? NULL;
    }

    public function render()
    {
        return view('livewire.application-form-video');
    }

    public function saveVideo()
    {
        $count = Media::where([
            ['application_id', '=', $this->application->id],
            ['media_for', '=', 'interview video']
        ])->count();
        // dd($count);

        if ($count != 1) {

            $checklist = FormChecklist::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'tab_name' => 'Video',
                ],
                [
                    'application_id' => $this->application->id,
                    'tab_name' => 'Video',
                    'tab_status' => 0,
                ]
            );
        }

        $rule_a1 = Rule::requiredIf(function () {
            return !isset($this->video_path);
        });

        $rule_a2 = 'mimes:mp4';


        $this->validate(
            [
                'video' => [$rule_a1, $rule_a2, 'max:5000'],

            ],
            [
                'video.required' => 'Please fill :attribute',
                'video.mimes' => 'File type must be MP4',
                'video.max' => 'Your file size must less than 5MB',
            ],
            [
                'video' => 'Video',

            ]
        );
        $msg = '';

        $extension = $this->video->getClientOriginalExtension();

        // dd($extension);
        if (!empty($this->video)) {
            // $fileName = time() . '_video_' . $this->video->getClientOriginalName();
            $fileName = time() . '_video_' . $this->application->user_id . '.' . $extension;

            $path = 'storage/' . $this->video->storeAs('video/mp4', $fileName, 'public');

            $mediaFor = 'interview video';

            $media = Media::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'media_for' => $mediaFor,
                ],
                [
                    'media_path' => $path,
                    'media_name' => $fileName,
                    'media_for' => $mediaFor,

                ]
            );
            $this->reset(['video']);
            $this->refresh();
            $msg = true;
        } else {
            $msg = false;
        }

        if ($msg) {
            $new_result = 'Video successfully uploaded';
            $statusInsert = ApplicationStatus::create([
                'application_id' => $this->application->id,
                'status_id' => 'AS01',
                'created_by' => Auth::user()->id,
            ]);

            $checklist = FormChecklist::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'tab_name' => 'Video',
                ],
                [
                    'application_id' => $this->application->id,
                    'tab_name' => 'Video',
                    'tab_status' => 1,
                ]
            );
        } else {
            $new_result = 'Video failed to be uploaded';
        }




        $this->dispatchBrowserEvent('showModal', ['message' => $new_result]);
    }

    public function refresh()
    {
        $application = $this->application;
        $media_InterviewVid = Get_Media($application->id, 'interview video');


        $this->video_path = $media_InterviewVid->media_path ?? NULL;
    }
}
