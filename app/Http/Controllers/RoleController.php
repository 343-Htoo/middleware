<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\RoleController;
// use Gate;
class RoleController extends Controller
{
    protected $roleService;
    public function __construct(RoleService $roleService){
        $this->roleService = $roleService;
    }
    public function index(){
        Gate::authorize('view-role');
        $permissions = $this->roleService->getPermission();
        $roles = $this->roleService->getAll();
        return view('roles.index' , compact( 'permissions','roles'));
    }
    // store
    public function store(Request $request){
         Gate::authorize('store-role');
         $this->roleService->create($request->all());
        return redirect()->route('role.index');
    }
    // edit
    public function edit($id){
         Gate::authorize('edit-role');
        $role = $this->roleService->getId($id);
        return view('roles.edit' , compact('role'));
    }

    //delete
    public function delete($id){
         Gate::authorize('delete-role');
        $this->roleService->getDelete($id);
        return redirect()->route('role.index');
    }

}

