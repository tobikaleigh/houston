<?php

namespace App;

use \App\ModelDefault;

class Device extends ModelDefault
{
    protected $fillable = ['state', 'active_today', 'active_this_week', 'active_this_month'];
}
