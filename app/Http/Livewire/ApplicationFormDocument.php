<?php

namespace App\Http\Livewire;

use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\FormChecklist;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\Null_;

class ApplicationFormDocument extends Component
{
    use WithFileUploads;

    public $application;
    public $business_reg_cert;
    public $owner_ic_file;
    public $fin_state_2020;
    public $fin_state_2021;
    public $epf_or_payslip;
    public $business_reg_cert_path;
    public $owner_ic_file_path;
    public $fin_state_2020_path;
    public $fin_state_2021_path;
    public $epf_or_payslip_path;

    public function mount($application)
    {
        $this->application = $application;
        // $media_businessRegCert = Media::select('media_path', 'media_name', 'media_for')
        // ->where(['application_id' => $application->id,'media_for' => 'business registration certificate',])->get();
        $media_businessRegCert = Get_Media($application->id, 'business registration certificate');
        $media_IcCert = Get_Media($application->id, 'identification card certificate');
        $media_FinState2020 = Get_Media($application->id, 'financial statement 2020');
        $media_FinState2021 = Get_Media($application->id, 'financial statement 2021');
        $media_EpfState = Get_Media($application->id, 'epf/payslip');

        // $media_businessRegCert = Get_Media($application->id, 'usiness registration certificate');

        // dd($media);

        $this->business_reg_cert_path = $media_businessRegCert->media_path ?? NULL;
        $this->owner_ic_file_path = $media_IcCert->media_path ?? NULL;
        $this->fin_state_2020_path = $media_FinState2020->media_path ?? NULL;
        $this->fin_state_2021_path = $media_FinState2021->media_path ?? NULL;
        $this->epf_or_payslip_path = $media_EpfState->media_path ?? NULL;

        // $this->business_reg_cert_path = $media_businessRegCert[0]->media_path;
        // $this->owner_ic_file_path = $media_IcCert[0]->media_path;
        // $this->fin_state_2020_path = $media_FinState2020[0]->media_path;
        // $this->fin_state_2021_path = $media_FinState2021[0]->media_path;
        // $this->epf_or_payslip_path = $media_EpfState[0]->media_path;
        // dd($this->business_reg_cert_path);
    }

    public function render()
    {
        return view('livewire.application-form-document');
    }

    public function saveFiles()
    {
        // dd(($this));
        $count = Media::where([
            ['application_id', '=', $this->application->id],
            ['media_for', '!=', 'interview video']
        ])->count();
        // dd($count);

        if ($count != 5) {

            $checklist = FormChecklist::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'tab_name' => 'Document',
                ],
                [
                    'application_id' => $this->application->id,
                    'tab_name' => 'Document',
                    'tab_status' => 0,
                ]
            );
        }

        $rule_a1 = Rule::requiredIf(function () {
            return !isset($this->business_reg_cert_path);
        });

        $rule_b1 = Rule::requiredIf(function () {
            return !isset($this->owner_ic_file_path);
        });
        $rule_c1 = Rule::requiredIf(function () {
            return !isset($this->fin_state_2020_path);
        });

        $rule_d1 = Rule::requiredIf(function () {
            return !isset($this->fin_state_2021_path);
        });

        $rule_e1 = Rule::requiredIf(function () {
            return !isset($this->epf_or_payslip_path);
        });

        // $rule_a2 = Rule::when(!isset($this->business_reg_cert_path), ['mimes:pdf']);
        // $rule_b2 = Rule::when(!isset($this->owner_ic_file_path), ['mimes:pdf,jpg,jpeg']);
        // $rule_c2 = Rule::when(!isset($this->fin_state_2020_path), ['mimes:pdf']);
        // $rule_d2 = Rule::when(!isset($this->fin_state_2021_path), ['mimes:pdf']);
        // $rule_e2 = Rule::when(!isset($this->epf_or_payslip_path), ['mimes:pdf']);

        $rule_a2 = 'mimes:pdf';
        $rule_b2 = 'mimes:pdf,jpg,jpeg';
        $rule_c2 = 'mimes:pdf';
        $rule_d2 = 'mimes:pdf';
        $rule_e2 = 'mimes:pdf';

        // $rule_a3 = Rule::when(!isset($this->fin_state_2020_path), ['max:6000']);

        $this->validate(
            [
                'business_reg_cert' => [$rule_a1, $rule_a2, 'max:6000'],
                'owner_ic_file' => [$rule_b1, $rule_b2, 'max:6000'],
                'fin_state_2020' => [$rule_c1, $rule_c2, 'max:6000'],
                'fin_state_2021' => [$rule_d1, $rule_d2, 'max:6000'],
                'epf_or_payslip' => [$rule_e1, $rule_e2, 'max:6000'],
                // 'business_reg_cert' => [$rule1, $rule2, 'max:1000'], // 1MB Max
                // 'business_reg_cert' => [$rule_c1, 'mimes:pdf','max:6000'], // 1MB Max
            ],
            [
                // 'issue.0.required','issue.0.not_in' => 'Please fill :attribute',
                'business_reg_cert.required' => 'Please fill :attribute',
                'business_reg_cert.mimes' => 'File type must be PDF',
                'business_reg_cert.max' => 'Your file size must less than 6MB',

                'owner_ic_file.required' => 'Please fill :attribute',
                // 'owner_ic_file.image' => 'File must be image',
                'owner_ic_file.mimes' => 'File type must be PDF, JPEG or JPG',
                'owner_ic_file.max' => 'Your file size must less than 6MB',

                'fin_state_2020.required' => 'Please fill :attribute',
                'fin_state_2020.mimes' => 'File type must be PDF',
                'fin_state_2020.max' => 'Your file size must less than 6MB',

                'fin_state_2021.required' => 'Please fill :attribute',
                'fin_state_2021.mimes' => 'File type must be PDF',
                'fin_state_2021.max' => 'Your file size must less than 6MB',

                'epf_or_payslip.required' => 'Please fill :attribute',
                'epf_or_payslip.mimes' => 'File type must be PDF',
                'epf_or_payslip.max' => 'Your file size must less than 6MB',


                // 'business_reg_cert.uploaded.mimes' => 'File type must be PDF',
                // 'business_reg_cert.uploaded.max' => 'Your file size must less than 6MB',

            ],
            [
                'business_reg_cert' => 'Business Registration Certificate',
                'owner_ic_file' => 'Owner Identification File',
                'fin_state_2020' => 'Financial Statement 2020',
                'fin_state_2021' => 'Financial Statement 2021',
                'epf_or_payslip' => 'EPF/Payslip',
            ]
        );

        $msg = [];
        if (!empty($this->business_reg_cert)) {
            $fileName = time() . '_businessreg_' . $this->business_reg_cert->getClientOriginalName();
            // $path = $this->business_reg_cert->store('public/bus_reg/pdf');
            $path = 'storage/' . $this->business_reg_cert->storeAs('bus_reg/pdf', $fileName, 'public');

            $media = Media::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'media_for' => 'business registration certificate',
                ],
                [
                    'media_path' => $path,
                    'media_name' => $fileName,
                    'media_for' => 'business registration certificate',

                ]
            );
            $this->reset(['business_reg_cert']);
            $this->refresh();
            $msg[] = true;
        } else {
            $msg[] = false;
        }

        if (!empty($this->owner_ic_file)) {
            $fileName = time() . '_ic_' . $this->owner_ic_file->getClientOriginalName();
            $path = 'storage/' . $this->owner_ic_file->storeAs('ic/pdf', $fileName, 'public');

            $media = Media::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'media_for' => 'identification card certificate',
                ],
                [
                    'media_path' => $path,
                    'media_name' => $fileName,
                    'media_for' => 'identification card certificate',

                ]
            );
            $this->reset(['owner_ic_file']);
            $this->refresh();
            $msg[] = true;
        } else {
            $msg[] = false;
        }

        if (!empty($this->fin_state_2020)) {
            $fileName = time() . '_2020_' . $this->fin_state_2020->getClientOriginalName();
            $path = 'storage/' . $this->fin_state_2020->storeAs('financial/pdf', $fileName, 'public');

            $media_for = 'financial statement 2020';

            $media = Media::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'media_for' => $media_for,
                ],
                [
                    'media_path' => $path,
                    'media_name' => $fileName,
                    'media_for' => $media_for,

                ]
            );
            $this->reset(['fin_state_2020']);
            $this->refresh();
            $msg[] = true;
        } else {
            $msg[] = false;
        }

        if (!empty($this->fin_state_2021)) {
            $fileName = time() . '_2021_' . $this->fin_state_2021->getClientOriginalName();
            $path = 'storage/' . $this->fin_state_2021->storeAs('financial/pdf', $fileName, 'public');

            $media_for = 'financial statement 2021';

            $media = Media::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'media_for' => $media_for,
                ],
                [
                    'media_path' => $path,
                    'media_name' => $fileName,
                    'media_for' => $media_for,

                ]
            );
            $this->reset(['fin_state_2021']);
            $this->refresh();
            $msg[] = true;
        } else {
            $msg[] = false;
        }

        if (!empty($this->epf_or_payslip)) {
            $fileName = time() . '_epf_' . $this->epf_or_payslip->getClientOriginalName();
            $path = 'storage/' . $this->epf_or_payslip->storeAs('epf/pdf', $fileName, 'public');

            $media_for = 'epf/payslip';

            $media = Media::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'media_for' => $media_for,
                ],
                [
                    'media_path' => $path,
                    'media_name' => $fileName,
                    'media_for' => $media_for,

                ]
            );
            $this->reset(['epf_or_payslip']);
            $this->refresh();
            $msg[] = true;
        } else {
            $msg[] = false;
        }

        // dd($msg);

        $rr = 'No file uploaded: ';
        if (in_array(true, $msg)) {
            $ss = 'Success file uploaded: ';
        } else {
            $ss = '';
        }
        $r = '';
        $s = '';
        $c = 0;
        foreach ($msg as $index => $m) {
            if ($m == false) {
                switch ($index) {
                    case 0:
                        $r = "business registration certificate";
                        break;
                    case 1:
                        $r = "identification card certificate";
                        break;
                    case 2:
                        $r = "financial statement 2020";
                        break;
                    case 3:
                        $r = "financial statement 2021";
                        break;
                    case 4:
                        $r = "epf/payslip";
                        break;
                }
                if ($c == 0) {
                    $rr = $rr . "" . $r;
                } else {
                    $rr = $rr . ", " . $r;
                }
                $c++;
            }
        }
        $c = 0;
        foreach ($msg as $index => $m) {
            if ($m == true) {
                switch ($index) {
                    case 0:
                        $s = "business registration certificate";
                        break;
                    case 1:
                        $s = "identification card certificate";
                        break;
                    case 2:
                        $s = "financial statement 2020";
                        break;
                    case 3:
                        $s = "financial statement 2021";
                        break;
                    case 4:
                        $s = "epf/payslip";
                        break;
                }
                if ($c == 0) {
                    $ss = $ss . "" . $s;
                } else {
                    $ss = $ss . ", " . $s;
                }
                $c++;
            }
        }

        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS01',
            'created_by' => Auth::user()->id,
        ]);

        $checklist = FormChecklist::updateOrCreate(
            [
                'application_id' =>  $this->application->id,
                'tab_name' => 'Document',
            ],
            [
                'application_id' => $this->application->id,
                'tab_name' => 'Document',
                'tab_status' => 1,
            ]
        );


        $new_result = $ss . "<br>" . $rr;


        $this->dispatchBrowserEvent('showModal', ['message' => $new_result]);
    }

    public function updatedBusinessRegCert()
    {
        $this->validate(
            [
                'business_reg_cert' => 'mimes:pdf|max:6000',
            ],
            [
                // 'issue.0.required','issue.0.not_in' => 'Please fill :attribute',
                'business_reg_cert.required' => 'Please fill :attribute',
                'business_reg_cert.mimes' => 'File type must be PDF',
                'business_reg_cert.max' => 'Your file size must less than 6MB',
                // 'business_reg_cert.uploaded.mimes' => 'File type must be PDF',
                // 'business_reg_cert.uploaded.max' => 'Your file size must less than 6MB',

            ],
            [
                'business_reg_cert' => 'Business Registration Certificate',
            ]
        );
    }

    public function refresh()
    {
        $application = $this->application;
        $media_businessRegCert = Get_Media($application->id, 'business registration certificate');
        $media_IcCert = Get_Media($application->id, 'identification card certificate');
        $media_FinState2020 = Get_Media($application->id, 'financial statement 2020');
        $media_FinState2021 = Get_Media($application->id, 'financial statement 2021');
        $media_EpfState = Get_Media($application->id, 'epf/payslip');

        // $media_businessRegCert = Get_Media($application->id, 'usiness registration certificate');

        // dd($media);

        $this->business_reg_cert_path = $media_businessRegCert->media_path ?? NULL;
        $this->owner_ic_file_path = $media_IcCert->media_path ?? NULL;
        $this->fin_state_2020_path = $media_FinState2020->media_path ?? NULL;
        $this->fin_state_2021_path = $media_FinState2021->media_path ?? NULL;
        $this->epf_or_payslip_path = $media_EpfState->media_path ?? NULL;
    }
}
