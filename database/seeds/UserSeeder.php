<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User();
        $user->first_name = "Amin";
        $user->last_name = "Raihan";
        $user->email = "amin@gmail.com";
        $user->password = Hash::make('pppppp');
        $user->phone = "+8801738671782";
        $user->address = "75 Pollobi Ponitula";
        $user->area = "Modina Market";
        $user->city = "Sylhet";
        $user->zip = "3100";
        $user->avatar = "amin.jpg";
        $user->save();

        $user = new App\User();
        $user->first_name = "Aditya";
        $user->last_name = "Ovi";
        $user->email = "ovi@gmail.com";
        $user->password = Hash::make('pppppp');
        $user->phone = "+8801738671782";
        $user->address = "9 Block H";
        $user->area = "Uposhohor";
        $user->city = "Sylhet";
        $user->zip = "3100";
        $user->avatar = "ovi.jpg";
        $user->save();

        $user = new App\User();
        $user->first_name = "Shahriar";
        $user->last_name = "Ahmed";
        $user->email = "shahriar@gmail.com";
        $user->password = Hash::make('pppppp');
        $user->phone = "+8801738671782";
        $user->address = "House 9 Block H";
        $user->area = "Uposhohor";
        $user->city = "Sylhet";
        $user->zip = "3100";
        $user->avatar = "shahriar.jpg";
        $user->save();

         $user = new App\User();
        $user->first_name = "Kawsar";
        $user->last_name = "Ahmed";
        $user->email = "kawsar@gmail.com";
        $user->password = Hash::make('pppppp');
        $user->phone = "+8801738671782";
        $user->address = "House 75 Block B Pollobi";
        $user->area = "Modina Market";
        $user->city = "Sylhet";
        $user->zip = "3100";
        $user->avatar = "admin.jpg";
        $user->save();
    }
}
