<?php

namespace App\Http\Controllers\User\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\RolePermission\PermissionRepository;

class PermissionController extends Controller
{
    private $permissionRepository;

    public function __construct(
        PermissionRepository $permissionRepository
    ){
        $this->middleware('permission:role-index|role-store|role-update|role-destroy', ['only' => ['index', 'show', 'data']]);
        $this->middleware('permission:role-store', ['only' => ['store']]);
        $this->middleware('permission:role-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-destroy', ['only' => ['destroy']]);
        $this->permissionRepository = $permissionRepository;
    }

    public function index($id){
        $data = $this->permissionRepository->index($id);
        return view('dashboard.role-permission.permission', compact('data'));
    }

    public function store(Request $request){
        $data = $this->permissionRepository->store($request);
        return redirect()->route('dashboard.role.index')->with('success', 'Permission berhasil disingkronkan');
    }
}
