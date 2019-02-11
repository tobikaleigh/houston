<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['state', 'active_this_week', 'active_this_month'];
    protected $dateFormat = 'U'; // Unix timestamp
}
