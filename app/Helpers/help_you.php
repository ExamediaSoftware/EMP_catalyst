<?php

use App\Events\NotifyAdmin;
use App\Events\NotifyApplicant;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Employee;
use App\Models\Financial;
use App\Models\Media;
use App\Models\Notification;
use App\Models\Ownership;
use App\Models\User;
use App\Models\VideoScore;

if (!function_exists('Get_Media')) {
    function Get_Media($applicationId, $mediaFor)
    {

        $result = Media::select('media_path', 'media_name', 'media_for')
            ->where(
                [
                    'application_id' => $applicationId,
                    'media_for' => $mediaFor,
                ]
            )->first();
        // dd($result);
        return $result;
    }
}

if (!function_exists('Get_ApplicationStatus')) {
    function Get_ApplicationStatus($applicationId)
    {


        $result = ApplicationStatus::where(
            [
                'application_id' => $applicationId,

            ]
        )
            ->orderBy('created_at', 'desc')
            ->first();
        // dd($result);
        return $result;
    }
}



if (!function_exists('Get_ComponentStage')) {
    function Get_ComponentStage($applicationId)
    {
        $application = Application::find($applicationId);
        $statusComponent = '';

        if ($application->currentStatus->status_id == 'Draft') {
            $statusComponent = 'admin-review-stage1';
        } elseif ($application->currentStatus->status_id == 'Submitted') {
            $statusComponent = 'admin-review-stage1';
        } elseif ($application->currentStatus->status_id == 'Reviewed') {
            $statusComponent = 'admin-review-stage2';
        } elseif ($application->currentStatus->status_id == 'Queried') {
            $statusComponent = 'admin-review-stage-queried';
        } elseif ($application->currentStatus->status_id == 'Resubmit') {
            $statusComponent = 'admin-review-stage1';
        } elseif ($application->currentStatus->status_id == 'Scored - Incomplete') {
            $statusComponent = 'admin-review-stage2';
        } elseif ($application->currentStatus->status_id == 'Scored - Video') {
            $statusComponent = 'admin-review-stage-scoredvideo';
        } elseif ($application->currentStatus->status_id == 'Selected - Interview') {
            $statusComponent = 'admin-review-stage-selectedinterview';
        } elseif ($application->currentStatus->status_id == 'Rejected - Interview') {
            $statusComponent = 'admin-review-stage-rejectbeforeinterview';
        } elseif ($application->currentStatus->status_id == 'Scored - Interview') {
            $statusComponent = 'admin-review-stage-scoredinterview';
        } elseif ($application->currentStatus->status_id == 'Approved') {
            $statusComponent = 'admin-review-stage-selectedfinal';
        } elseif ($application->currentStatus->status_id == 'Rejected') {
            $statusComponent = 'admin-review-stage-rejectafterscoreinterview';
        } elseif ($application->currentStatus->status_id == 'Verified') {
            $statusComponent = 'admin-review-stage-successful';
        }

        // $statusComponent = 'admin-review-stage1';
        // dd($application->currentStatus->status_id);
        // dd($statusComponent);
        return $statusComponent;
    }
}

if (!function_exists('Get_AutomaticScore')) {
    function Get_AutomaticScore($applicationId, $isTotal)
    {
        // $application = Application::find($applicationId);

        $totalPercentage_Bumi = Ownership::groupBy('shareholder_race')
            ->selectRaw('sum(shareholder_percentage) as sum, shareholder_race')
            ->where([
                ['application_id', '=', $applicationId],
                ['shareholder_race', '=', 'R01']
            ])
            ->pluck('sum')->first();

        $score = 0;
        $score_array = array(
            'bumi' => 0,
            'revenue' => 0,
            'staf' => 0,
            'document' => 0,
            'video' => 0,
        );

        if ($totalPercentage_Bumi > 51) {
            $score++;
            $score_array['bumi'] = 1;
        }


        $financial = Financial::where([
            ['application_id', '=', $applicationId],
        ])->get();

        // dd($financial);       

        $boundry_eligible1 = [100000, 199000];
        $boundry_eligible2 = [1010000, 1100000];
        $boundry_preferred1 = [200000, 1000000];

        $subscore = 0;
        $max = $subscore;

        foreach ($financial as $item) {
            $value = $item['financial_revenue'];
            if (($boundry_eligible1[0] <= $value) && ($value <= $boundry_eligible1[1])) {
                $subscore = 1;
            }

            if (($boundry_eligible2[0] <= $value) && ($value <= $boundry_eligible2[1])) {
                $subscore = 1;
            }

            if (($boundry_preferred1[0] <= $value) && ($value <= $boundry_preferred1[1])) {
                $subscore = 2;
            }
            if ($subscore > $max) {
                $max = $subscore;
            }
        }

        $score += $max;
        $score_array['revenue'] = $max;


        $totalEmployees = Employee::groupBy('application_id')
            ->selectRaw('sum(emp_total_no) as sum, application_id')
            ->where([
                ['application_id', '=', $applicationId],
            ])
            ->pluck('sum')->first();

        // dd($totalEmployees);

        if ($totalEmployees > 5) {
            $score++;
            $score_array['staf'] = 1;
        }

        //doc is required, so +1
        $score++;
        $score_array['document'] = 1;
        //video is required, so +1
        $score++;
        $score_array['video'] = 1;

        if ($isTotal) {
            $result = $score;
        } else {
            $result = $score_array;
        }

        return $result;
    }
}

if (!function_exists('Get_VideoScore')) {
    function Get_VideoScore($applicationId, $isTotal)
    {
        $vid = VideoScore::where([
            ['application_id', '=', $applicationId]
        ])
            // groupBy('application_id')
            // ->selectRaw('max(application_status_id) as max, application_id, video_score')
            // ->where([
            //     ['application_id', '=', $applicationId]
            // ])
            ->get();

        $totalVideoScore = VideoScore::groupBy('application_id')
            ->selectRaw('sum(video_score) as sum, application_id')
            ->where([
                ['application_id', '=', $applicationId]
            ])
            ->pluck('sum')->first();

        // dd($vid);
        if ($isTotal) {
            $result = $totalVideoScore;
        } else {
            $result = $vid;
        }

        return $result;
    }
}

if (!function_exists('f_notifyAdmin')) {
    function f_notifyAdmin($applicationId, $status)
    {
        $users_admin =  User::role('Admin')->get();
        $message = '';
        // dd($status);
        // dd($users_admin);
        if ($status == "AS02") {
            $message = 'An application with no: AA' . $applicationId . ' has been submitted';
        } elseif ($status == 'AS13') {
            $message = 'An application with no: AA' . $applicationId . ' has been resubmitted';
        } elseif ($status == 'AS04') {
            $message = 'An application with no: AA' . $applicationId . ' has been reviewed and pending for scoring';
        } elseif ($status == 'interviewed') {
            $message = 'An application with no: AA' . $applicationId . ' has interview pending to be score';
        } elseif ($status == 'AS10') {
            $message = 'An application with no: AA' . $applicationId . ' pending to be verified';
        } elseif ($status == 'AS13') {
            $message = 'An application with no: AA' . $applicationId . ' has been resubmitted';
        }
        // dd($message);
        foreach ($users_admin as $admin) {

            Notification::create([
                'user_id' => $admin->id,
                'message' => $message,
                'isRead' => 0,
            ]);
        }
        event(new NotifyAdmin('Hai'));
    }
}

if (!function_exists('f_notifyApplicant')) {
    function f_notifyApplicant($applicationId, $status, $interview_date = NULL)
    {
        $application = Application::find($applicationId);

        // dd($users_admin);
        if ($status == 'ASO2') {
            $message = 'An application with no: AA' . $applicationId . ' has been submitted';
        } elseif ($status == 'AS13') {
            $message = 'An application with no: AA' . $applicationId . ' has been resubmitted';
        } elseif ($status == 'AS04') {
            $message = 'An application with no: AA' . $applicationId . ' has been reviewed and pending for scoring';
        } elseif ($status == 'interviewed') {
            $message = 'An application with no: AA' . $applicationId . ' has interview pending to be score';
        } elseif ($status == 'AS10') {
            $message = 'An application with no: AA' . $applicationId . ' pending to be verified';
        } elseif ($status == 'AS03') {
            $message = 'Your application with no: AA' . $applicationId . ' has been queried';
        }elseif ($status == 'AS07') {
            $message = 'Your application with no: AA' . $applicationId . ' has been selected for interview on '. $interview_date;
        }elseif ($status == 'AS12') {
            $message = 'Congrats! Your application with no: AA' . $applicationId . ' has been successfull';
        }


        Notification::create([
            'user_id' => $application->user_id,
            'message' => $message,
            'isRead' => 0,
        ]);

        event(new NotifyApplicant($application->user_id));
    }
}
