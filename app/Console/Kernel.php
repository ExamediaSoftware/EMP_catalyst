<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $interview_passed = DB::table('interviews')
                ->whereRaw('DATEDIFF(interview_score,current_date) < 2 AND interview_score = NULL')
                ->get();

                foreach($interview_passed as $i){
                    f_notifyAdmin($i->application_id, 'interviewed');
                }

                $interview_passed = DB::table('interviews')
                ->whereRaw('DATEDIFF(interview_score,current_date) < 2 AND interview_score = NULL')
                ->get();
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
