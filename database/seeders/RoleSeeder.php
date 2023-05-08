<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

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
        $role->name = "super-admin";

        if ($role->save()) {
            $role->allowTo('force-delete');
            $role->allowTo('role-management');
        }

        $role = new Role();
        $role->name = "admin";
        if ($role->save())
            $role->allowTo('modify');


        $role = new Role();
        $role->name = "user";
        if ($role->save())
            $role->allowTo('access');
    }
}
