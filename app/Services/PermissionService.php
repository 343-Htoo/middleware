<?php

namespace App\Services;


use App\Models\Permission;
use App\Services\PermissionService;


class PermissionService
{

    // create
    public function create($data){
        return Permission::create($data);
    }
    //get
    public function getAll(){
        return Permission::all();
    }
    // get id
    public function  getId($id){
        return Permission::find($id);
    }
    // update
    public function getUpdate($data , $id){
        $permission = Permission::find($id);
        $permission->update($data);
        return $permission;
    }
    // delete
    public function getDelete($id){
        $permission = Permission::find($id);
        $permission->delete($id);
        return $permission;

    }

}
