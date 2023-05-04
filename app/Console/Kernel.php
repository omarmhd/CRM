<?php

namespace App\Console;

use App\Models\Client;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
        $schedule->call(function () {
            // Get today's date
            $today = Carbon::now()->format('m-d');

            // Find clients with a date of birth that matches today's date
            $clients = Client::whereRaw("DATE_FORMAT(BOD,'%m-%d') = '".$today."'")->get();

            // Loop through each matching client and send an SMS message
            foreach ($clients as $client) {
                // Use a package or API to send an SMS message

                try {
                    $response = Http::get('http://www.hotsms.ps/sendbulksms.php', [
                        'user_name' => 'Rami Dabous',
                        'user_pass' => '3324878',
                        'sender' =>'Rami Dabous',
                        'mobile' => $client->phone,
                        'type' => 0,
                        'text' => "مجوهرات رامي الضابوس تتمنى لك ميلاد سعيد ❤"
                    ]);
                } catch (\Exception $e) {
                    // Log the error message
                    Log::error('Failed to send birthday SMS to '.$client->name.'. Error message: '.$e->getMessage());
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
