<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Controllers\RoleController;
// use Gate;
class RoleController extends Controller
{
    protected $roleService;
    public function __construct(RoleService $roleService){
        $this->roleService = $roleService;
    }
    public function index(){
        $permissions = $this->roleService->getPermission();
        $roles = $this->roleService->getAll();
        return view('roles.index' , compact( 'permissions','roles'));
    }
    // store
    public function store(Request $request){
         $this->roleService->create($request->all());
        return redirect()->route('role.index');
    }
    // edit
    public function edit($id){
        // Gate::authorize('edit-settings');
        $role = $this->roleService->getId($id);
        return view('roles.edit' , compact('role'));
    }

}

