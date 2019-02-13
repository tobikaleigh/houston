<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = $this->show();

        return response()->json($settings->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \App\Setting $setting;
     * 
     */
    public function store()
    {
        return Setting::create([
            'user_id'   => 1,
        ]);
    }

    /**
     * Display the specified resource.
     * 
     * @return \App\Setting $settings
     * 
     */
    public function show()
    {
        $settings = Setting::where('user_id', 1)->first();

        return $settings = !$settings ? $this->store():$settings;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $settings
     * 
     */
    public function update(Request $request)
    {
        $settings = $this->show();

        $settings->update(['user_settings' => $request->all()]);

        return response()->json($settings->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
