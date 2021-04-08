<?php

use Illuminate\Database\Seeder;

class SocialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social = new App\Social();
        $social->name = "Facebook";
        $social->link = "https://www.facebook.com/";
        $social->icon_class = "fa fa-facebook";
        $social->save();

        $social = new App\Social();
        $social->name = "Twitter";
        $social->link = "https://twitter.com/";
        $social->icon_class = "fa fa-twitter";
        $social->save();

        $social = new App\Social();
        $social->name = "Instagram";
        $social->link = "https://www.instagram.com/";
        $social->icon_class = "fa fa-instagram";
        $social->save();

        $social = new App\Social();
        $social->name = "Location";
        $social->link = "https://www.google.com.bd/maps/place/Al+Hamra+Shopping+City/@24.897095,91.867982,18.5z/data=!4m13!1m7!3m6!1s0x3750552af8919883:0x6fc2fe33c01b3797!2zWmluZGFiYXphciwg4Ka44Ka_4Kay4KeH4Kaf!3b1!8m2!3d24.8948017!4d91.8690311!3m4!1s0x0:0x268dcbd12a1df334!8m2!3d24.8972775!4d91.8681794";
        $social->icon_class = "fa fa-map-marker";
        $social->save();
    }
}
