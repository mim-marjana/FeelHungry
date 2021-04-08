<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = new App\Team();
        $team->name = "Hamid Uddin";
        $team->designation = "Owner";
        $team->photo = "5.jpg";
        $team->save();

        $team = new App\Team();
        $team->name = "Amin Uddin";
        $team->designation = "Manager";
        $team->photo = "6.jpg";
        $team->save();

        $team = new App\Team();
        $team->name = "Gordon Ramsay";
        $team->designation = "Head Chef";
        $team->photo = "1.jpg";
        $team->save(); 

        $team = new App\Team();
        $team->name = "Jamie Oliver";
        $team->designation = "Sauce Chef";
        $team->photo = "4.jpg";
        $team->save();

        $team = new App\Team();
        $team->name = "Vikas Khanna";
        $team->designation = "Indian Chef";
        $team->photo = "7.jpg";
        $team->save();

        $team = new App\Team();
        $team->name = "Curtis Stone";
        $team->designation = "Assistent Chef";
        $team->photo = "2.jpg";
        $team->save();

        $team = new App\Team();
        $team->name = "Richard Blais";
        $team->designation = "Assistent Chef";
        $team->photo = "3.jpg";
        $team->save(); 
    }
}
