<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Resources\DeviceResource as DeviceResource;
use App\Http\Resources\DeviceCollection as DeviceCollection;
use Illuminate\Http\Request;

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
        try {
            $device->update($request->all());
        }
        catch(\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Invalid data given'], 400);
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
}
