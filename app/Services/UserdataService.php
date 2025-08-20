<?php

namespace App\Services;

use App\Models\Role;
use App\Models\Userdata;

class UserdataService
{
    public function getRole(){
        return Role::all();
    }

    public function getAll(){
        return Userdata::with('role.permissions')->get();
    }

    public function getId($id){
        return Userdata::with('role.permissions')->find($id);
    }

    public function create(array $data){
        return Userdata::create($data);
    }

    public function getUpdate(array $data, $id){
        $userdata = Userdata::findOrFail($id);

        if (!empty($data['password'])) {
            $userdata->update($data);
        } else {
            unset($data['password']);
            $userdata->update($data);
        }

        return $userdata;
    }

    public function getDelete($id){
        $userdata = Userdata::findOrFail($id);
        return $userdata->delete();
    }
}
