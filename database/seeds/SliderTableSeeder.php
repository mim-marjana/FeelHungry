<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slider = new App\Slider();
        $slider->slide = "11.jpg";
        $slider->heading = "Chase the flavors";
        $slider->slide_text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam";
        $slider->button_text = "Order Online";
        $slider->button_link = "/menu";
        $slider->save();

        $slider = new App\Slider();
        $slider->slide = "4.jpg";
        $slider->heading = "Book Your Table Now";
        $slider->slide_text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam";
        $slider->button_text = "Book Table";
        $slider->button_link = "/reservation";
        $slider->save();



        $slider = new App\Slider();
        $slider->slide = "15.jpg";
        $slider->heading = "Where taste meets the myth";
        $slider->slide_text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam";
        $slider->button_text = "Order Now";
        $slider->button_link = "/menu";
        $slider->save();


    }
}
