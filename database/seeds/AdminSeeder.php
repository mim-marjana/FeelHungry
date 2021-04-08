<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new App\Admin();
        $admin->first_name = "Kawsar";
        $admin->last_name = "Ahmed";
        $admin->email = "admin@gmail.com";
        $admin->password = Hash::make('pppppp');
        $admin->phone = "+8801738671782";
        $admin->address = "75 Pollobi Ponitula";
        $admin->area = "Modina Market";
        $admin->city = "Sylhet";
        $admin->zip = "3100";
        $admin->avatar = "admin.jpg";
        $admin->save();

        $admin = new App\Admin();
        $admin->first_name = "Adiba";
        $admin->last_name = "Omi";
        $admin->email = "adiba@gmail.com";
        $admin->password = Hash::make('pppppp');
        $admin->phone = "+8801738671782";
        $admin->address = "78 Pollobi Ponitula";
        $admin->area = "Modina Market";
        $admin->city = "Sylhet";
        $admin->zip = "3100";
        $admin->avatar = "admin2.jpg";
        $admin->save();
    }
}
