<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsMessage extends Model
{
    //
    protected $fillable=["client_id","message"];
    public function clients(){
      return $this->belongsTo("App\Client");
    }
}
