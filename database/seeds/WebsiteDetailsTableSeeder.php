<?php

use Illuminate\Database\Seeder;

class WebsiteDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $details = new App\WebsiteDetail();
        $details->logo = "logo-bold.png";
        $details->dash_logo = "logo-dash.png";
        $details->name = "Everyday's Bite";
        $details->email = "mail@everydaysbite.com";
        $details->phone = "+8801738671782";
        $details->location = "k47 Complex, 2nd Floor, Nayasarak Road, Sylhet 3100";
        $details->open_time = "Everyday 10:00am - 11.30pm";
        $details->close_time = "Friday";
        $details->map_link = "https://www.google.com/maps/dir/''/''/@24.8972612,91.7981391,12z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x3750552bc8816749:0x268dcbd12a1df334!2m2!1d91.8681794!2d24.8972775";

         $details->save();
    }
}
