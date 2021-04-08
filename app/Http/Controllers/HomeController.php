<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DishCategory;
use App\Dish;
use App\Slider;
use App\HomeNav;
use App\Review;
use App\Team;
use App\Gallery;
use App\WebsiteDetail;
use App\Contact;
use App\Reservation;
use App\Faq;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */




    // --> Display Home Page with Sliders & Chef Special Dish and Most Loved Dish and Dish Category Navigation
    public function index()
    {
        $slider = Slider::all();
        $homeNav = HomeNav::all();

        $loved_dish = Dish::where('most_loved','1')
                ->orderBy('id','desc')
                ->get();

        $chef_dishes = Dish::where('chef_special','1')
                ->orderBy('id','desc')
                ->get();

        return view('home',['slider' => $slider,'homeNav' => $homeNav,'chef_dishes'=>$chef_dishes,'loved_dish'=>$loved_dish]);
    }




    // --> Display About Page with Reviews & Team
    public function getAbout()
    {
        $reviews_slides = Review::orderBy('id','desc')->take(5)->get();
        $reviews = Review::orderBy('id','desc')->get();
        $team = Team::all();
        return view('about',['reviews_slides'=>$reviews_slides,'reviews'=>$reviews,'team'=>$team]);
    }

    public function searchReview(Request $request)
    {
        $name = $request->name;
        $reviews = Review::where('name', 'LIKE', '%'.$name.'%')->get();
        return view('review-search',['reviews'=>$reviews,'search_item'=>$name]);
    }

    

    // --> User Posting A Feedback/Review
    public function postReview(Request $request){
        $review = new Review();
        $review->name = $request->name;
        $review->email = $request->email;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();
        $name = $review->name;
        $url = route('about') . '#reviews-small';
        return redirect($url)->with('success','Thank You For Your Feedback '.$name);
    }



    // --> Display Menu Page with DIsh categories and All the Dishes for Each Category
    public function getMenu()
    {
        $categories = DishCategory::all();
        return view('menu',['categories' => $categories]);
    }



    // --> Display Reservation page
    public function getReservation()
    {
        return view('reservation');
    }




    // --> Making A Reservation For Table Booking
    public function postReservation(Request $request)
    { 
        $reservation = Reservation::where('date',$request->date)
            ->where('phone',$request->phone)
            ->where('time_slot',$request->time)
            ->first();

        if(!empty($reservation)){

            $message = "You already Have A Reservation at $request->date for $request->time";
            return redirect()->back()->with("error",$message);
        }
        else{
           $reservations = Reservation::where('date',$request->date)
           ->where('time_slot',$request->time)
           ->get();
           $totalPerson = 0;
           foreach ($reservations as $reservation) {
               $totalPerson += $reservation->num_of_person;
           }
           $totalPersonAvailable = $totalPerson + $request->person;
           if($totalPersonAvailable>20){
                $message = "Booking is not Available for $request->time at $request->date";
                return redirect()->back()->with("error",$message);
           }else{
                $reservation = new Reservation();
                $reservation->name = $request->name;
                $reservation->phone = $request->phone;
                $reservation->date = $request->date;
                $reservation->num_of_person = $request->person;
                $reservation->time_slot = $request->time;
                $reservation->save();
                
                $message = "Your Table is Booked for $request->time at $request->date";
                return redirect()->back()->with("success",$message);
           }
           
        }
    }





    // --> Display Gallery page with Photos
    public function getGalleries()
    {
        $galleries = Gallery::orderBy('id','desc')->get();
        return view('galleries',['galleries' => $galleries]);
    }


    // --> Display Contact page Website Details
    public function getContact()
    {
        $details = WebsiteDetail::first()->get();
        return view('contact',['details' => $details]);
    }



    // --> Saving User Contact Message to Database
    public function postContact(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success','Your message was sent Successfully');
    }

    
    // --> Display Faq Page with All FAQS
    public function getFaqs()
    {
        $faqs = Faq::orderBy('id','desc')->get();
        return view('faqs',['faqs'=>$faqs]);
    }
}
