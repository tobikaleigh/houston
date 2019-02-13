<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Device;
use DB;
use \Carbon\Carbon;

class ProcessStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $timestampStartOfToday = Carbon::today()->timestamp;
        $timestampStartOfWeek = Carbon::today()->startOfWeek()->timestamp;
        $timestampStartOfMonth = Carbon::today()->startOfMonth()->timestamp;
        $devices = Device::all();

        foreach($devices as $device) {
            $secondsActiveToday = DB::table('devices_activity_log')->where([
                ['device_id', $device->id],
                ['went_offline_at', '>=', $timestampStartOfToday],
            ])->sum('duration');

            $secondsActiveThisWeek = DB::table('devices_activity_log')->where([
                ['device_id', $device->id],
                ['went_offline_at', '>=', $timestampStartOfWeek],
            ])->sum('duration');

            $secondsActiveThisMonth = DB::table('devices_activity_log')->where([
                ['device_id', $device->id],
                ['went_offline_at', '>=', $timestampStartOfMonth],
            ])->sum('duration');
            
            $stats['active_today'] = $secondsActiveToday;
            $stats['active_this_week'] = $secondsActiveThisWeek;
            $stats['active_this_month'] = $secondsActiveThisMonth;

            $device->update($stats);
        }
    }
}
