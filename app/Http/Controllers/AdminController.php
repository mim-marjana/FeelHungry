<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Order;
use App\Slider;
use App\Review;
use App\Team;
use App\User;
use App\Gallery;
use App\WebsiteDetail;
use App\Social;
use App\DishCategory;
use App\Dish;
use App\Contact;
use App\HomeNav;
use App\Reservation;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    // --> Display Admin Register Page
    public function register(){
        $role = Auth::user()->role->name;
        if($role == "Super"){
            return view('admin.register');
        }
        else{
            return redirect()->route('admin.dashboard');
        } 
    }



    // --> Adding New Admin with FORM Request 
    public function postRegister(Request $request){
        $role = Auth::user()->role->name;
        if($role == "Super"){
            $admin = new Admin();
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->save();

            return redirect()->route('admin.admins')->with('success',$admin->first_name." is added as new Admin");
        }
        else{
            return redirect()->route('admin.dashboard');
        }
    }



    // --> Display Admin Dashboard
    public function index()
    {

        //$date = date('h:i'); 
        //dd($date);
        //$currentTi = echo date('h:i:s a m/d/Y', strtotime($date));

        $allPendingOrders = Order::where('status','0')->get();
        $SuccessfullOrders = Order::where('status','1')->get();
        $TodaysOrders = Order::whereDate('created_at', DB::raw('CURDATE()'))
                ->where('status','1')
                ->get();

        
        $todaysPaymentsNumber = $TodaysOrders->count();
        $TodaysEarnings=0;
        $totalEarning =0;


        $pendingOrders = $allPendingOrders->count();
        $successfullOrderToday = $TodaysOrders->count();
        $successfullOrdersOverall =$SuccessfullOrders->count();

        foreach ($TodaysOrders as $today ) {
            $TodaysEarnings += $today->total;
        }
        foreach ($SuccessfullOrders as $order ) {
            $totalEarning += $order->total;
        }


        $dishes = Dish::all();
        $dishCategory = DishCategory::all();
        $todaysDate = date('d M Y');
        // $allReservationsToday = Reservation::where('date',$todaysDate )
        //         ->where('status','1')
        //         ->get();
        $allReservationsPending = Reservation::where('status','0')->get();
        $reservationsPending = $allReservationsPending->count();
        $totalDish = $dishes->count();
        $totalCategory = $dishCategory->count();
        //dd($reservationsToday);


        $admin = Auth::user();
        return view('admin.dashboard',["admin" => $admin,
            'todaysPaymentsNumber'=>$todaysPaymentsNumber,
            'TodaysEarnings'=>$TodaysEarnings,
            'totalEarning'=>$totalEarning,
            'pendingOrders'=>$pendingOrders,
            'successfullOrderToday'=>$successfullOrderToday,
            'successfullOrdersOverall'=>$successfullOrdersOverall,
            'reservationsPending'=>$reservationsPending,
            'totalDish'=>$totalDish,
            'totalCategory'=>$totalCategory]);
    }


    // --> Display Logged-in Admin Profile
    public function getAdmin()
    {
        $admin = Auth::user();
        return view('admin.profile',['admin' => $admin]);
    }


    // --> Display Logged-in Admin Profile Update Page
    public function viewUpdateUser()
    {
        $admin = Auth::user();
        return view('admin.admins.update-profile',['admin' => $admin]);
    }


    // --> Update Logged in Admin information
    public function UpdateAdmin(Request $request){

        $admin_id = $request->id;
        $admin = Admin::find($admin_id);
        $new_photo = $request->file('avatar');

        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->area = $request->area;
        $admin->city = $request->city;
        $admin->zip = $request->zip;
        $admin->save(); 

        if(!empty($new_photo)){
            if(!empty($admin->avatar)){
                $photo_path = public_path().'/assets/img/admins/'.$admin->avatar; 
                unlink($photo_path);    
            }
            
            $photo_name = uniqid().$new_photo->getClientOriginalName();
            $upload = $new_photo->move('assets/img/admins/',$photo_name);
            $admin->avatar = $photo_name;
        }
        $admin->save();
        return redirect()->route('admin.profile')->with('success','Profile Infomation updated Successfully');
    }



    // --> Display All Admins Page
    public function getAllAdmins(){

        $role = Auth::user()->role->name;
        if($role == "Super"){
            $admins = Admin::paginate(5);
            return view('admin.admins.admins',['admins'=>$admins]);
        }
        else{
            return redirect()->route('admin.dashboard');
        } 
    }


    // --> Display All Admins Profile Page
    public function viewUser($admin_id)
    {
        $role = Auth::user()->role->name;
        if($role == "Super"){
            $admin = Admin::find($admin_id);
            return view('admin.admins.profile',['admin' => $admin]);
        }
        else{
            return redirect()->route('admin.dashboard');
        }
        
    } 


    // --> Deleting an Admin
    public function deleteAdmin($admin_id){   
        $role = Auth::user()->role->name;
        if($role == "Super"){
            $admin = Admin::find($admin_id);
            $admin_name = $admin->first_name;
            $admin->delete();
            return redirect()->back()->with('success', $admin_name.' is deleted from Admins');
        }
        else{
            return redirect()->route('admin.dashboard');
        } 
    }



    // --> Display Admin Home Page with Sliders and Fav Dishes
    public function getHome(){
        $slider = Slider::all();
        $homeNav = HomeNav::all();
        $chef_dishes = Dish::where('chef_special','1')->get();
        $loved_dish = Dish::where('most_loved','1')->get();
        $dishes = Dish::all();
        return view('admin.home',['slider'=>$slider,'chef_dishes'=>$chef_dishes,'loved_dish'=>$loved_dish,'dishes'=>$dishes,'homeNav' => $homeNav]);
    }


    // --> Add Dish to Chef Special  
    public function addChefSpecial(Request $request){
        if(!empty($request->dish_id)){
            $dish = Dish::find($request->dish_id);
            $dish->chef_special = '1';
            $dish->save();
            $name = $dish->name;
            return redirect()->back()->with('success', $name.' Added to Chef Special Dishes');
        }
         return redirect()->back()->with('error', 'No dish was selected');
        
    }



    // --> Add Dish to Most Loved Dish List
    public function addLovedDish(Request $request){
        if(!empty($request->dish_id)){
            $dish = Dish::find($request->dish_id);
            $dish->most_loved = '1';
            $dish->save();
            $name = $dish->name;
            return redirect()->back()->with('success', $name.' Added to Most Loved Dishes');   
        }
        return redirect()->back()->with('error', 'No dish was selected');
            
    }


    // --> Remove Dish From Chef Special List
    public function removeChefSpecial($dish_id){
        $dish = Dish::find($dish_id);
        $dish->chef_special = '0';
        $dish->save();
        $name = $dish->name;
        return redirect()->back()->with('success', $name.' Removed from Chef Special Dishes'); 
    }


    // --> Remove Dish From Most Loved List
    public function removeLovedDish($dish_id){
        $dish = Dish::find($dish_id);
        $dish->most_loved = '0';
        $dish->save();
        $name = $dish->name;
        return redirect()->back()->with('success', $name.' Removed from Most Loved Dishes'); 
    }



    // --> Remove Dish From Chef Special List
    public function addNewSlide(Request $request){
        $slide = $request->file('slide');
        $slide_name = uniqid().$slide->getClientOriginalName();

        $slide_upload = $slide->move('assets/img/slider/',$slide_name);

        if($slide_upload){
            $slider = new Slider();
            $slider->slide = $slide_name;
            $slider->heading = $request->heading;
            $slider->slide_text = $request->slide_text;
            $slider->button_text = $request->button_text;
            $slider->button_link = $request->button_link;
            $slider->save();
        }else{
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.home')->with('success',"New Slide Uploaded");
    }

    public function deleteSlide(Request $request){
        $slide_id = $request->slide_id;
        $slide = Slider::find($slide_id);
        $slide->delete();

        $slide_path = public_path().'/assets/img/slider/'.$slide->slide; 
        unlink($slide_path);

        return response()->json(['msg'=>'Slide Deleted Sucessfully']);
    }

    public function getEditSlide(Request $request){
        $slide_id = $request->slide_id;
        $slide = Slider::find($slide_id);
        $heading = $slide->heading;
        $slide_text = $slide->slide_text;
        $button_text = $slide->button_text;
        $button_link = $slide->button_link;
        $slide_id = $slide->id;
        return response()->json(['msg'=>'Slide Updated Sucessfully','heading'=>$heading,'slide_text'=>$slide_text,'button_link'=>$button_link,'button_text'=>$button_text,'slide_id'=>$slide_id]);
    }

    public function editSlide(Request $request){
        $slide_id = $request->slide_id;
        $slide = Slider::find($slide_id);

        $new_photo = $request->file('slide');

        if(!empty($new_photo)){
            $slide_name = uniqid().$new_photo->getClientOriginalName();
            $photo_path = public_path().'/assets/img/slider/'.$slide->slide; 
            unlink($photo_path);
            $upload = $new_photo->move('assets/img/slider/',$slide_name);
            $slide->slide = $slide_name;
            
        }

        $slide->heading = $request->heading;
        $slide->slide_text = $request->slide_text;
        $slide->button_text = $request->button_text;
        $slide->button_link = $request->button_link;
        $slide->save();

        return redirect()->route('admin.home')->with("success","Slide Updated Successfully");
    }


    // Admin Navigation Manage
    public function getEditNav(Request $request){
        $nav_id = $request->id;
        $nav = HomeNav::find($nav_id);
        $heading = $nav->nav_text;
        $link = $nav->nav_link;
        $nav_id = $nav->id;
        return response()->json(['heading'=>$heading,'link'=>$link,'nav_id'=>$nav_id]);
    }

    public function editNav(Request $request){
        $id = $request->id;
        $nav = HomeNav::find($id);

        $new_photo = $request->file('photo');

        if(!empty($new_photo)){
            $photo_name = uniqid().$new_photo->getClientOriginalName();
            $photo_path = public_path().'/assets/img/ctg/'.$nav->photo; 
            unlink($photo_path);
            $upload = $new_photo->move('assets/img/ctg/',$photo_name);
            $nav->photo = $photo_name;    
        }

        $nav->nav_link = $request->nav_link;
        $nav->nav_text = $request->nav_text;
        $nav->save();

        return redirect()->route('admin.home')->with("success","Navigation Updated Successfully");
    }




    
    public function getReviews(){
        $reviews = Review::orderBy('id','desc')->get();
        return view('admin.reviews',['reviews'=>$reviews]);
    }
    public function deleteReview(Request $request){
        $review_id = $request->review_id;
        $review = Review::find($review_id);
        $review->delete();
        return response()->json(['msg'=>'Review Deleted Sucessfully']);
    }


    
    public function getTeam(){
        $team = Team::all();
        return view('admin.team',['team' => $team]);
    }
    public function addNewTeamn(Request $request){
        $photo = $request->file('photo');
        if(!empty($photo)){
            $photo_name = uniqid().$photo->getClientOriginalName();
            $photo_save = $photo->move('assets/img/team/',$photo_name);
            if($photo_save){
                $member = new Team();
                $member->photo = $photo_name;
                $member->name = $request->name;
                $member->designation = $request->designation;
                $member->save();
            }else{
                return redirect()->route('admin.dashboard');
            }
        }else{
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.team')->with('success','New Member Added successfully');
    }

    public function getEditTeam(Request $request){
        $team_id = $request->team_id;
        $member = Team::find($team_id);

        $name = $member->name;
        $designation = $member->designation;
        $member_id = $member->id;

        return response()->json(['msg'=>'Slide Updated Sucessfully','name'=>$name,'designation'=>$designation,'member_id'=>$member_id]);
    }


    public function updateTeamMember(Request $request){
        $member_id = $request->member_id;
        $member = Team::find($member_id);

        $new_photo = $request->file('photo');

        if(empty($new_photo)){  //if Admin did not Attached any New Photo
            $member->name = $request->name;
            $member->designation = $request->designation;
            $member->save();
            return redirect()->route('admin.team')->with('success','Member informaton is Updated Successfully without New Photo');
        }
        else{ //if Admin Attached a New Photo for the Member

            $photo_path = public_path().'/assets/img/team/'.$member->photo; 
            unlink($photo_path);

            $photo_name = uniqid().$new_photo->getClientOriginalName();
            $photo_save = $new_photo->move('assets/img/team/',$photo_name);

            $member->photo = $photo_name;
            $member->name = $request->name;
            $member->designation = $request->designation;
            $member->save();
            return redirect()->route('admin.team')->with('success','Member informaton is Updated Successfully with New Photo');
        }
    }

    public function deleteTeamMember($id){
        $member = Team::find($id);
        $photo_path = public_path().'/assets/img/team/'.$member->photo; 
        unlink($photo_path);
        $member->delete();
        return redirect()->route('admin.team')->with('success','Team Member Deleted Successfully');
    }
    






    public function getCustomers(){
        $customers = User::paginate(5);
        return view('admin.customers',['customers' => $customers]);
    }

    public function getSingleCustomer($id){
        $customer = User::find($id);
        return view('admin.customer-profile',['customer'=>$customer]);
    }

    public function deleteCustomer($id){
        $customer = User::find($id);
        if(!empty($customer->avatar)){
            $photo_path = public_path().'/assets/img/users/'.$customer->avatar; 
            unlink($photo_path);    
        }
        foreach($customer->orders as $order){
           $order->delete();
        };
        $customer->delete();
        return redirect()->route('admin.customers')->with('success','Customer Deleted Successfully');
    }



    
    public function getGalleries(){
        $photos = Gallery::all();
        return view('admin.galleries',['photos'=>$photos]);
    }
    public function addNewPhoto(Request $request){
        $photo = $request->file('photo');
        $photo_name = uniqid().$photo->getClientOriginalName();

        if(!empty($photo)){
            $upload = $photo->move('assets/img/photos/',$photo_name);
            $gallery = new Gallery();
            $gallery->name = $photo_name;
            $gallery->caption = $request->caption;
            $gallery->save();

            return redirect()->back()->with('success','New Photo Uploaded successfully');   
        }
        return redirect()->back()->with('error','There was some Error uploading the Photo. Please Try again later');    
    }

    public function deletePhoto($id){

        $photo = Gallery::find($id);
        $photo_path = public_path().'/assets/img/photos/'.$photo->name; 
        unlink($photo_path);
        $photo->delete();
        return redirect()->back()->with('success','Photo Deleted Successfully');    
    }

    public function getEditPhoto(Request $request){
        $id = $request->photo_id;
        $photo = Gallery::find($id);
        $caption = $photo->caption;
        $id = $photo->id;
        return response()->json(['msg'=>'Edit Form Success Full','caption'=>$caption,'id'=>$id]);
    }
    public function editPhoto(Request $request){
        $photo = Gallery::find($request->id);
        $new_photo = $request->file('photo');

        if(!empty($new_photo)){

            $photo_path = public_path().'/assets/img/photos/'.$photo->name; 
            unlink($photo_path);

            $photo_name = uniqid().$new_photo->getClientOriginalName();
            $upload = $new_photo->move('assets/img/photos/',$photo_name);
            $photo->caption = $request->caption;
            $photo->name = $photo_name;
            $photo->save();

            return redirect()->back()->with('success','Photo Updated Successfully');
        }else{
            $photo->caption = $request->caption;
            $photo->save();
            return redirect()->back()->with('success','Photo Updated Successfully');
        }
    }



    
    public function getDetails(){
        $details = WebsiteDetail::all();
        $socials = Social::all();
        return view('admin.details',['details'=>$details,'socials'=>$socials]);
    }
    public function viewUpdateDetails()
    {   
        $details = WebsiteDetail::first();
        return view('admin.update-site-details',['details' => $details]);
    }
    public function updateDetails(Request $request)
    {
        $details_id = $request->id;
        $details = WebsiteDetail::find($details_id);
        $logo = $request->file('logo');
        $dash_logo = $request->file('dash_logo');

        $details->name = $request->name;
        $details->email = $request->email;
        $details->phone = $request->phone;
        $details->location = $request->location;
        $details->open_time = $request->open_time;
        $details->close_time = $request->close_time;
        $details->map_link = $request->map_link;

        if(!empty($logo)){
            $photo_path = public_path().'/assets/img/'.$details->logo; 
            unlink($photo_path);
            $photo_name = date('His').$logo->getClientOriginalName();
            $upload = $logo->move('assets/img/',$photo_name);
            $details->logo = $photo_name;
        }
        if(!empty($dash_logo)){
            $photo_path = public_path().'/assets/img/'.$details->dash_logo; 
            unlink($photo_path);
            $photo_name = date('His').$dash_logo->getClientOriginalName();
            $upload = $dash_logo->move('assets/img/',$photo_name);
            $details->dash_logo = $photo_name;
        }
        $details->save();
        return redirect()->route('admin.details')->with('success','Website Infomation updated Successfully');   
    }






    
    public function getDish(){
        $dishCategory = DishCategory::all();
        $dishes = Dish::paginate(10);
        return view('admin.dish',['dishCategory'=>$dishCategory,'dishes'=>$dishes]);
    }

    public function addNewDishCategory(Request $request){
        $category = new DishCategory();
        $category->name = $request->name;
        $category->category_id = strtok($request->name,' ');
        $category->save();

        return redirect()->back()->with('success',$category->name.' Added to Dish Categories'); 
    }
    public function deleteDishCategory($id){
        $category = DishCategory::find($id);
        $category_name = $category->name;
        foreach($category->dishes as $dish){
           $dish->delete();
        };
        $category->delete();

        return redirect()->back()->with('success',$category_name.' Deleted From Dish Categories with All the associated dishes');
    }
    public function editDishCategory(Request $request){
        $id = $request->id;
        $category = DishCategory::find($id);
        $name = $category->name;
        return response()->json(['name'=>$name,'id'=>$id]);
    }
    public function UpdateDishCategory(Request $request){
        $id = $request->id;
        $category = DishCategory::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('success',$category->name.' Updated');
    }






    public function addNewDish(Request $request){
        $photo = $request->file('photo');

        $dish = new Dish();
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->details = $request->details;
        $dish->dish_category_id = $request->category;
        if(!empty($photo)){
            $photo_name = uniqid().$photo->getClientOriginalName();
            $photo->move('assets/img/dish/',$photo_name);
            $dish->photo = $photo_name;
        }
        $dish->save();

        $dish_name = $request->name;

        return redirect()->back()->with('success',$dish_name.' Added to Dish Collection'); 

    }
    public function viewDishDetails(Request $request){
        $id = $request->id;
        $dish = Dish::find($id);
        $name = $dish->name;
        $details = $dish->details;
        $price = $dish->price;
        $category = $dish->dish_category->name;
        $photo = $dish->photo;

        return response()->json(['name'=>$name,'details'=>$details,'price'=>$price,'category'=>$category,'photo'=>$photo]);
    }

    public function editDish(Request $request){
        $id = $request->id;
        $dish = Dish::find($id);

        $name = $dish->name;
        $details = $dish->details;
        $price = $dish->price;
        $id = $dish->id;

        return response()->json(['name'=>$name,'details'=>$details,'price'=>$price,'id'=>$id]);
    }

    public function editDishSubmit(Request $request){
        $id = $request->dish_id;
        $dish = Dish::find($id);
        $dish_name = $dish->name;
        $new_photo = $request->file('photo');

        if(!empty($new_photo)){
            $photo_name = uniqid().$new_photo->getClientOriginalName();
            $photo_path = public_path().'/assets/img/dish/'.$dish->photo; 
            unlink($photo_path);
            $new_photo->move('assets/img/dish/',$photo_name);
            $dish->photo = $photo_name;
        }

        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->details = $request->details;
        if(!empty($request->category)){
            $dish->dish_category_id = $request->category;
        }

        $dish->save();

        return redirect()->back()->with('success',$dish_name.' Updated');
    }
    public function deleteDish($id){
        $dish = Dish::find($id);
        $dish_name = $dish->name;
        $photo_path = public_path().'/assets/img/dish/'.$dish->photo; 
            unlink($photo_path);
        $dish->delete();

        return redirect()->back()->with('success',$dish_name.' Deleted From Dish Collection');
    }








    public function getOrders(){
        $orders = Order::orderBy('id','desc')->paginate(5);
        return view('admin.orders',['orders'=>$orders]);
    }


    public function getSingleOrderCategory(){
        $complete_orders = Order::where('status','1')->orderBy('id','desc')->get();
        $pending_orders = Order::where('status','0')->orderBy('id','desc')->get();
        return view('admin.orders-single',['complete_orders'=>$complete_orders,'pending_orders'=>$pending_orders]);
    }

    public function getSingleOrder($order_id){
        $order = Order::find($order_id);
        $cart_items = unserialize($order->cart);
        $information = unserialize($order->checkout_info);
        return view('admin.view-order',['order' =>$order,'cart_items' => $cart_items,'information' => $information]);
    } 

    
    public function updateOrderStatus($order_id){
        $order = Order::find($order_id);

        $checkout_info = unserialize($order->checkout_info);
        $cart_items = unserialize($order->cart);

        if($order->status == 0){
            $order->status = 1;
            $order->save();
            $message = 'Order #'.$order->id.' by '.$order->user->first_name.' is Confirmed';

            $details = WebsiteDetail::first();
            $user = $order->user;
            $name = $user->first_name.' '.$user->last_name;
            $email = $user->email;
            $total = $order->total;
            $qty = $order->qty;
            $id = $order->id;
            $date = $order->created_at->format('d M Y');

            $data=array(
                "name" => $name,
                "email" => $email,
                "checkout_info" => $checkout_info,
                'cart_items' =>$cart_items,
                'details' => $details,
                'total' => $total,
                'qty' =>  $qty,
                'id' => $id,
                'date' => $date
            );

            Mail::send('emails.confirm-order',$data,function($m) use ($data) {
                $m->to($data['email']);
                $m->from('everydaysByte@gmail.com');
                $m->subject('Order Confirmation');
            });
            return redirect()->back()->with('success',$message);

        }else{
            $order->status = 0; 
            $order->save();
            $message = 'Order #'.$order->id.' by '.$order->user->first_name.' is Canceled';
            return redirect()->back()->with('error',$message);
        }
        
    }
    public function sendInvoice($order_id){
        $order = Order::find($order_id);

        $checkout_info = unserialize($order->checkout_info);
        $cart_items = unserialize($order->cart);

        $details = WebsiteDetail::first();
        $user = $order->user;
        $name = $user->first_name.' '.$user->last_name;
        $email = $user->email;
        $total = $order->total;
        $qty = $order->qty;
        $id = $order->id;
        $date = $order->created_at->format('d M Y');

        $data=array(
            "name" => $name,
            "email" => $email,
            "checkout_info" => $checkout_info,
            'cart_items' =>$cart_items,
            'details' => $details,
            'total' => $total,
            'qty' =>  $qty,
            'id' => $id,
            'date' => $date
        );

        Mail::send('emails.confirm-order',$data,function($m) use ($data) {
            $m->to($data['email']);
            $m->from('everydaysByte@gmail.com');
            $m->subject('Order Confirmation');
        });
        return redirect()->back()->with('success','Invoice Sent to Customer successfully'); 
    }


    public function deleteOrder($order_id){
        $order = Order::find($order_id);
        $order->delete();
        $message = 'Order #'.$order->id.' by '.$order->user->first_name.' is Deleted';
        return redirect()->back()->with('error',$message);
    }
    





    public function getReservations(){
        $reservations = Reservation::orderBy('id','desc')->paginate(6);
        return view('admin.reservations',['reservations'=>$reservations]);
    } 
    public function getReservationsbyDate(Request $request){
        $date = $request->date;
        $reservations = Reservation::where('date',$date)->orderBy('id','desc')->get();
        return view('admin.reservationsbydate',['reservations'=>$reservations,'date'=>$date]);
    }

    public function updateReservation($id){
        $reservation = Reservation::find($id);
        if($reservation->status == 0){
            $reservation->status = 1;
            $reservation->save();
            return redirect()->back()->with("success","Reservation Confirmed");    
        }
        $reservation->status = 0;
        $reservation->save();
        return redirect()->back()->with("success","Reservation Canceled");
    }
    public function deleteReservation($id){
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with("error","Reservation Deleted");
    }
    



    public function getInvoices(){
        $orders = Order::orderBy('id','desc')->paginate(10);
        foreach ($orders as $order) {
            $order->cart = unserialize($order->cart);
        }
        return view('admin.invoices.invoice',['orders'=>$orders]);
    }
    public function viewInvoice($id){
        $details = WebsiteDetail::first();
        $order = Order::find($id);
        $order->cart = unserialize($order->cart);
        $order->checkout_info = unserialize($order->checkout_info);
        $name = $order->user->first_name;
        return view('admin.invoices.invoice-view',['order'=>$order,'details'=>$details]);
    }


    public function getMessages(){
        $messages = Contact::orderBy('id','desc')->get();
        $first_message = Contact::orderBy('id','desc')->first();
        return view('admin.messages',['messages' => $messages,'first_message'=>$first_message]);
    }
    public function showMessage(Request $request){
        $id = $request->id;
        $message = Contact::find($id);
        $name=$message->name;
        $email=$message->email;
        $date=$message->created_at->format('d M Y');
        $message=$message->message;
        return response()->json(['name'=>$name,'email'=>$email,'message'=>$message,'date'=>$date]);
    }
    public function deleteMessages($id){
        $message = Contact::find($id);
        $msg = "Message by $message->name is Deleted";
        $message->delete();
        return redirect()->route('admin.messages')->with("error",$msg);
    }
    

}
