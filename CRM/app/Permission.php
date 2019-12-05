<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable=["name","description"];

    public function roles(){
      return $this->belongsToMany('App\Role' , "role_permissions", 'permission_id', 'role_id');
    }
}
