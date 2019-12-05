<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable=["name","description","landing_page"];

    public function permissions(){
      return $this->belongsToMany('App\Permission' , "role_permissions", 'role_id', 'permission_id');
    }

    public function users(){
      return $this->belongsToMany('App\User' , "user_roles", 'role_id', 'user_id');
    }
}
