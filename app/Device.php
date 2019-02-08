<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['state'];
    protected $dateFormat = 'U'; // Unix timestamp
}
