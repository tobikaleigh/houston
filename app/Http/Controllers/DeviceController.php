<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Resources\DeviceResource as DeviceResource;
use App\Http\Resources\DeviceCollection as DeviceCollection;
use Illuminate\Http\Request;

use DB;

class DeviceController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DeviceCollection(Device::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Device $device)
    {
        return new DeviceResource($device);
    }

    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        if($device->state == $request->state) {
            return response()->json(['error', "State didn't change!"], 400);
        }

        try {
            $device->update($request->all());
            $this->logActivityFor($device);
        }
        catch(\Illuminate\Database\QueryException $e) {
            return response()->json([
                'error' => 'Invalid data given',
                'msg'   => $e->getMessage(),
            ], 400);
        }

        return new DeviceResource($device);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }

    /**
     * Log activity for device
     * 
     * @param \App\Device $device
     */
    private function logActivityFor(Device $device) {
        $lastRecord = DB::table('devices_activity_log')->where('device_id', $device->id)->orderBy('id', 'desc')->first();

        if($device->state) {
            DB::table('devices_activity_log')->insert([
                'device_id'        => $device->id,
                'went_online_at'   => time(),
            ]);
        }

        if(!$device->state) {
            DB::table('devices_activity_log')->where('id', $lastRecord->id)->update([
                'went_offline_at'   => time(),
                'duration'          => time() - $lastRecord->went_online_at,
            ]);
        }
    }
}
