<?php

namespace App;

use \App\ModelDefault;

class Setting extends ModelDefault
{
    protected $fillable = ['user_id', 'user_settings'];

    public function setUserSettingsAttribute($value) {
        $this->attributes['user_settings'] = json_encode($value);
    }

    public function get() {
        return json_decode($this->user_settings);
    }
}
