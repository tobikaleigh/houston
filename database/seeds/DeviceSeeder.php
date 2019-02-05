<?php

use Illuminate\Database\Seeder;
use App\Device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devicesToSeed = [
            [
                'name'      => 'Lights',
                'fa_icon'   => 'far fa-lightbulb'
            ],
            [
                'name'      => 'Vent',
                'fa_icon'   => 'fas fa-sync',
            ]
        ];

        foreach($devicesToSeed as $device) {
            Device::create($device);
        }
    }
}
