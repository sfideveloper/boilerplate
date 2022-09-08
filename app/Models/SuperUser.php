<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class SuperUser extends Model
{
    use HasFactory, HasRoles; 


    protected $table='super_user';

    protected $guard_name = 'web';
}
