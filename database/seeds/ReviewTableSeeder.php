<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $review = new App\Review();
        $review->name = "Alistair Jones";
        $review->email = "alistair@gmail.com";
        $review->rating = "5";
        $review->comment = "This is simply the best Indian restaurant in Town and I have tried them all, the meat is top quality, the produce is fresh and the service is first class.";
        $review->save();

        $review = new App\Review();
        $review->name = "Dean Newton";
        $review->email = "newton@gmail.com";
        $review->rating = "5";
        $review->comment = "I was introduced to this restaurant by an Indian family member. This is new my new local! Food is absolutely on point";
        $review->save();

        $review = new App\Review();
        $review->name = "Ismet Kestek";
        $review->email = "Ismet@gmail.com";
        $review->rating = "5";
        $review->comment = "If You Are Looking For A Indian Meal Then Everyday's Is The Place. Always Infused With Flavour And Spices And Plenty Of Meat In The Dishes, Then This Is The Place.";
        $review->save();

        $review = new App\Review();
        $review->name = "Wesley Shuwai";
        $review->email = "Wesley@gmail.com";
        $review->rating = "5";
        $review->comment = "This is simply the best Indian restaurant in Town and I have tried them all, the meat is top quality, the produce is fresh and the service is first class.";
        $review->save();

        $review = new App\Review();
        $review->name = "Karl Bowman";
        $review->email = "karl@gmail.com";
        $review->rating = "4";
        $review->comment = "Once again the Everyday's delivered our takeaway on time, great food as always, great service";
        $review->save();

        $review = new App\Review();
        $review->name = "William Ambrose";
        $review->email = "william@gmail.com";
        $review->rating = "5";
        $review->comment = "The food here is amazing definitely recommend getting their take-out, will certainly be ordering again soon. ";
        $review->save();

        $review = new App\Review();
        $review->name = "Luke Andrews";
        $review->email = "alistair@gmail.com";
        $review->rating = "5";
        $review->comment = "1st time trying this Restaurent, absolutely great food would highly recommend safe to say is now my regular";
        $review->save();




        $review = new App\Review();
        $review->name = "Shahriar Ahmed";
        $review->email = "shahrair@gmail.com";
        $review->rating = "5";
        $review->comment = "This is simply the best Indian restaurant in Town and I have tried them all, the meat is top quality, the produce is fresh and the service is first class.";
        $review->save();

        $review = new App\Review();
        $review->name = "Nayon Ahmed Chy";
        $review->email = "Nayon@gmail.com";
        $review->rating = "5";
        $review->comment = "I was introduced to this restaurant by an Indian family member. This is new my new local! Food is absolutely on point";
        $review->save();

        $review = new App\Review();
        $review->name = "Adittya Ovi";
        $review->email = "adi@gmail.com";
        $review->rating = "5";
        $review->comment = "If You Are Looking For A Indian Meal Then Everyday's Bite Is The Place. Always Infused With Flavour And Spices And Plenty Of Meat In The Dishes, Then This Is The Place.";
        $review->save();

        $review = new App\Review();
        $review->name = "Amin Raihan";
        $review->email = "amin@gmail.com";
        $review->rating = "5";
        $review->comment = "This is simply the best Indian restaurant in Town and I have tried them all, the meat is top quality, the produce is fresh and the service is first class.";
        $review->save();

        $review = new App\Review();
        $review->name = "Rifat Ansari ";
        $review->email = "rifat@gmail.com";
        $review->rating = "5";
        $review->comment = "1st time trying this Restaurent, absolutely great food would highly recommend safe to say is now my regular";
        $review->save();

        $review = new App\Review();
        $review->name = "Saikat Mia";
        $review->email = "saikat@gmail.com";
        $review->rating = "4";
        $review->comment = "Once again Everyday's Bite braintree delivered our takeaway on time, great food as always, great service";
        $review->save();

        $review = new App\Review();
        $review->name = "Refat Ali";
        $review->email = "refat@gmail.com";
        $review->rating = "5";
        $review->comment = "The food here is amazing definitely recommend getting their take-out, will certainly be ordering again soon. ";
        $review->save();

    }
}
