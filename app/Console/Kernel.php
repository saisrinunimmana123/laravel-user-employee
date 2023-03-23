<?php

namespace App\Console;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\MyJob;
class Kernel extends ConsoleKernel 
{
    protected $commands = [
         Commands\PromotionalEmails::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // dd(1);
        // $schedule->command('promotional:emails')->everyMinute();
    //     $schedule->call(function () {
    //      DB::table('User')->delete();
    //     // \Log::info("test");
    //     // dispatch(new SendEmailJob());
    // })->everyMinute();
         $schedule->command('promotional:emails')->everyFiveMinutes();
        
         $schedule->job(new MyJob)->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}