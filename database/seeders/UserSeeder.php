<?php

namespace Database\Seeders;

use App\Models\SuperUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'allrole']);

        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleSuperAdmin->givePermissionTo('allrole');
        $roleSPV = Role::create(['name' => 'spv']);
        $roleSPV->givePermissionTo('allrole');
        $roleSales = Role::create(['name' => 'sales']);
        $roleSales->givePermissionTo('allrole');
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('allrole');
        
        $superadmin = SuperUser::create([
            'id_client'         => '1',
            'id_regency'        => '1',
            'id_district'       => '1',    
            'nama_user'          => 'SuperAdmin',
            'email_user'         => 'superadmin@gmail.com',
            'password'      => Hash::make('superadmin'),
            'hp_user'       =>  '081123123321',
            'alamat_user'   => "Jl. Sudirman",
            'email_verified_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            // 'api_token'     => Str::random(10),
        ]);
        $superadmin->assignRole($roleSuperAdmin);

        $spv = SuperUser::create([
            'id_client'         => '1',
            'id_regency'        => '0',
            'id_district'       => '0', 
            'nama_user'          => 'SPV',
            'email_user'         => 'spv@gmail.com',
            'password'      => Hash::make('spv'),
            'hp_user'       =>  '081123123321',
            'alamat_user'   => "Jl. Sudirman",
            'email_verified_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            // 'api_token'     => Str::random(10),
        ]);
        $spv->assignRole($roleSPV);

        $sales = SuperUser::create([
            'id_client'         => '1',
            'id_regency'        => '0',
            'id_district'       => '0', 
            'nama_user'          => 'Sales',
            'email_user'         => 'spv@gmail.com',
            'password'          => Hash::make('spv'),
            'hp_user'       =>  '081123123321',
            'alamat_user'   => "Jl. Sudirman",
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // 'api_token'     => Str::random(10),
        ]);
        $spv->assignRole($roleSales);

        $admin = SuperUser::create([
            'id_client'         => '1',
            'id_regency'        => '0',
            'id_district'       => '0', 
            'nama_user'          => 'Admin',
            'email_user'         => 'admin@gmail.com',
            'password'          => Hash::make('admin'),
            'hp_user'       =>  '081123123321',
            'alamat_user'   => "Jl. Sudirman",
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // 'api_token'     => Str::random(10),
        ]);
        $admin->assignRole($roleAdmin);


        // DB::table('super_user')->insert([
        //     'nama_user' => Str::random(10),
        //     'email_user' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
            
        // ]);
    }
}
