<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role = new Role();
        $role->nombre_rol ="usuario";
        $role->save();

        $role = new Role();
        $role->nombre_rol ="admin";
        $role->save();
    }
}
