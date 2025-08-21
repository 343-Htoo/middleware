<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Services\PermissionService;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    protected  $permissionService;
    public function __construct(PermissionService $permissionService)
    {
         $this->permissionService = $permissionService;
    }

    public function index(){
         $permissions = $this->permissionService->getAll();
        return view('permissions.index' , compact('permissions'));
    }
    // create
    public function store(Request $request){
        Gate::authorize('store-permission');
       $this->permissionService->create($request->all());
       return redirect()->route('permission.index');
    }
    // edit
    public function edit($id){
           Gate::authorize('edit-permission');

        $permission = $this->permissionService->getId($id);
        return view('permissions.edit' , compact('permission'));
    }

    // update
    public function update(Request $request , $id){
        Gate::authorize('update-permission');
        $this->permissionService->getUpdate($request->all() , $id);
        return redirect()->route('permission.index');

    }

    // delete
    public function delete($id){
           Gate::authorize('delete-permission');

        $this->permissionService->getDelete($id);
        return redirect()->route('permission.index');
    }

    // view
    public function show($id){
        Gate::authorize('view-permission');

        $permission = $this->permissionService->getId($id);
        return view('permissions.show' , compact('permission'));
    }

}

