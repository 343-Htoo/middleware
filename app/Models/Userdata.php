<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

     public function role(){
        return $this->belongsTo(Role::class);
    }
}
