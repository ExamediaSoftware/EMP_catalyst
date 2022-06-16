<?php

use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Media;

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
        }elseif ($application->currentStatus->status_id == 'Submitted') {
            $statusComponent = 'admin-review-stage1';
        } elseif ($application->currentStatus->status_id == 'Reviewed') {
            $statusComponent = 'admin-review-stage2';
        } elseif ($application->currentStatus->status_id == 'Queried') {
            $statusComponent = 'admin-review-stage-queried';
        } elseif ($application->currentStatus->status_id == 'Resubmit') {
            $statusComponent = 'admin-review-stage1';
        } elseif ($application->currentStatus->status_id == 'Scored - Incomplete') {
            $statusComponent = 'admin-review-stage2';
        }elseif ($application->currentStatus->status_id == 'Scored - Video') {
            $statusComponent = 'admin-review-stage-scoredvideo';
        }elseif ($application->currentStatus->status_id == 'Selected - Interview') {
            $statusComponent = 'admin-review-stage-selectedinterview';
        }elseif ($application->currentStatus->status_id == 'Rejected - Interview') {
            $statusComponent = 'admin-review-stage-rejectbeforeinterview';
        }elseif ($application->currentStatus->status_id == 'Scored - Interview') {
            $statusComponent = 'admin-review-stage-scoredinterview';
        }elseif ($application->currentStatus->status_id == 'Approved') {
            $statusComponent = 'admin-review-stage-selectedfinal';
        }elseif ($application->currentStatus->status_id == 'Rejected') {
            $statusComponent = 'admin-review-stage-rejectafterscoreinterview';
        }elseif ($application->currentStatus->status_id == 'Verified') {
            $statusComponent = 'admin-review-stage-successful';
        }

        // $statusComponent = 'admin-review-stage1';
        // dd($application->currentStatus->status_id);
        // dd($statusComponent);
        return $statusComponent;
    }
}
