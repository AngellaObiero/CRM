<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_permission extends Model
{
    //
    public function permissions()
    {
      // code...
      return $this->belongsTo("App\Permission","permission_id");
    }
}
