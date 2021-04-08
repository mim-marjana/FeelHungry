<?php

use Illuminate\Database\Seeder;

class adminRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role = new App\Role();
       $role->name = "Super";
       $role->save();

       $role = new App\Role();
       $role->name = "Regular";
       $role->save();
    }
}
