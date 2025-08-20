<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserdataService;

class UserdataController extends Controller
{
    protected $userdataService;

    public function __construct(UserdataService $userdataService){
        $this->userdataService = $userdataService;
    }

    public function index(){
        $datas = $this->userdataService->getAll();
        $roles = $this->userdataService->getRole();
        return view('users.index', compact('roles', 'datas'));
    }

    public function store(Request $request){
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:userdatas,email',
            'password' => 'required|min:6',
            'role'  => 'required|exists:roles,id',
        ]);

        $data =  $this->userdataService->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role_id'  => $request->role,
        ]);

        return redirect()->route('user.index');
    }

    public function edit($id){
        $user = $this->userdataService->getId($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:userdatas,email,' . $id,
            'password' => 'nullable|min:6',
            'role_id'  => 'required|exists:roles,id',
        ]);

        $this->userdataService->getUpdate([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password ? bcrypt($request->password) : null,
            'role_id'  => $request->role_id,
        ], $id);

        return redirect()->route('user.index');
    }

    public function delete($id){
        $this->userdataService->getDelete($id);
        return redirect()->route('user.index');
    }

    public function show($id){
        $user = $this->userdataService->getId($id);
        return view('users.view', compact('user'));
    }
}
