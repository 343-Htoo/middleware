<?php

namespace App\Models;

use App\Models\Userdata;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class , 'role_permission');
    }

    public function userdatas(){
        return $this->hasMany(Userdata::class);
    }
}
