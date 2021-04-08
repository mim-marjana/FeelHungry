<?php

use Illuminate\Database\Seeder;

class HomeNavTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nav = new App\HomeNav();
        $nav->photo = "popular.jpg";
        $nav->nav_text = "Popular Dishes";
        $nav->nav_link = "/menu#popular";
        $nav->save();

        $nav = new App\HomeNav();
        $nav->photo = "chicken.jpg";
        $nav->nav_text = "Chicken Specials";
        $nav->nav_link = "/menu#chicken";
        $nav->save();

        $nav = new App\HomeNav();
        $nav->photo = "fish.jpg";
        $nav->nav_text = "Fish & Prawn";
        $nav->nav_link = "/menu#fishnprawn";
        $nav->save();

        $nav = new App\HomeNav();
        $nav->photo = "shawarma.jpg";
        $nav->nav_text = "Shawarma";
        $nav->nav_link = "/menu#shawarma";
        $nav->save();
    }
}
