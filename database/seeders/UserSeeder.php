<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleSPV = Role::create(['name' => 'spv']);
        $roleSales = Role::create(['name' => 'sales']);
        $roleAdmin = Role::create(['name' => 'admin']);
        
        $superadmin = User::create([
            'nama_user'          => 'SuperAdmin',
            'email_user'         => 'superadmin@gmail.com',
            'password'      => Hash::make('superadmin'),
            'email_verified_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'api_token'     => Str::random(10),
        ]);
        $superadmin->assignRole($roleSuperAdmin);

        $spv = User::create([
            'nama_user'          => 'SPV',
            'email_user'         => 'spv@gmail.com',
            'password'      => Hash::make('spv'),
            'email_verified_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            // 'api_token'     => Str::random(10),
        ]);
        $spv->assignRole($roleSPV);

        $sales = User::create([
            'nama_user'          => 'Sales',
            'email_user'         => 'spv@gmail.com',
            'password'      => Hash::make('spv'),
            'email_verified_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            // 'api_token'     => Str::random(10),
        ]);
        $spv->assignRole($roleSales);

        $admin = User::create([
            'nama_user'          => 'Admin',
            'email_user'         => 'admin@gmail.com',
            'password'      => Hash::make('admin'),
            'email_verified_at'=> Carbon::now()->format('Y-m-d H:i:s'),
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
