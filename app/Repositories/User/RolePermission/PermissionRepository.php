<?php

namespace App\Repositories\User\RolePermission;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRepository {
    private $role;
    private $permission;

    public function __construct(
        Role $role,
        Permission $permission
    ){
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index($id){
        $role = $this->role->where('id', $id)->with(['permissions'])->firstOrFail();
        $permission = $this->permission->get();

        $data = [
            'role' => $role, 
            'all_permission' => $permission
        ];

        return $data;
    }

    public function store($request){
        $data = $this->role::find($request['id']);
        $data->syncPermissions($request['permission']);
        return $data;
    }
}