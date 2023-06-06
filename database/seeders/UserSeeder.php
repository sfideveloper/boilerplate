<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => "superadmin",
            'email' => "superadmin@gmail.com",
            'password' => Hash::make('password'),
        ]);

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'role' => [
                'role-index',
                'role-store',
                'role-update',
                'role-destroy',
            ],
            'user' => [
                'user-index',
                'user-store',
                'user-update',
                'user-destroy',
            ],
            'filemanager' => [
                'filemanager-index',
                'filemanager-store',
                'filemanager-update',
                'filemanager-destroy',
            ],
            'blog' => [
                'blog-index',
                'blog-store',
                'blog-update',
                'blog-destroy',
            ],
            'crud' => [
                'crud-index',
                'crud-store',
                'crud-update',
                'crud-destroy',
            ],
        ];

        foreach ($permissions as $k => $v) {
            foreach ($v as $key => $value) {
                $arr = [];
                $arr['name'] = $value;
                $arr['guard_name'] = 'web';
                Permission::create($arr);
            }
        }

        $superadmin_role = Role::create(['name' => 'Superadmin'])->givePermissionTo([
            $permissions
        ]);
        $superadmin = $superadmin->fresh();
        $superadmin->syncRoles(['superadmin']);

        $superadmin_role = Role::create(['name' => 'Inactive']);
    }
}
