<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(DishCategoryTableSeeder::class);
        // $this->call(DishTableSeeder::class);
        // $this->call(TeamTableSeeder::class);
        // $this->call(ReviewTableSeeder::class);
        // $this->call(WebsiteDetailsTableSeeder::class);
        // $this->call(GalleriesTableSeeder::class);
        // $this->call(SliderTableSeeder::class);
        // $this->call(HomeNavTableSeeder::class);
        // $this->call(SocialsTableSeeder::class);
        // $this->call(ContactTabeleSeeder::class);
        // $this->call(adminRoleTableSeeder::class);
        // $this->call(FaqTableSeeder::class);
    }
}
