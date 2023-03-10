<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->name = "access";
        $permission->save();


        $permission = new Permission();
        $permission->name = "modify";
        $permission->save();

        $permission = new Permission();
        $permission->name = "force-delete";
        $permission->save();

        $permission = new Permission();
        $permission->name = "role-management";
        $permission->save();
    }
}
