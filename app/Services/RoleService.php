<?php

namespace App\Services;

use App\Models\Role;
use App\Models\Permission;
use App\Services\RoleService;

class RoleService

{
    public function getAll(){
        return Role::with('permissions')->get();
    }

    public function getPermission(){
        return Permission::all();
    }
    // create
    public function create($data){
    $role = Role::create([
        'name' => $data['name'],
    ]);

    if (isset($data['permission'])) {
        $role->permissions()->sync($data['permission']);
    }
    return $role;

    }
    // edit
    public function getId($id){
       return  Role::find($id);
    }

}
