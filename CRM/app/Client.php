<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable=["name","phone","email","dob","basicInfo","profpic"];
}
