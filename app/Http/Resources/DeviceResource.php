<?php

namespace App\Http\Resources;
use Date;

use Illuminate\Http\Resources\Json\Resource;

class DeviceResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        return $data;
    }
}
