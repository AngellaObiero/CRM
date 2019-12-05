<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable=["name","details","event_date","time_from","time_to"];
}
