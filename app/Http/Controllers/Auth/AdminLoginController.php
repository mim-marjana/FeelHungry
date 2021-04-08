<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\WebsiteDetail;

class AdminLoginController extends Controller
{
   
   public function __construct(){
      $this->middleware('guest:admin',['except' => ['logout']]);
   }
   public function showLoginForm(){
      $details = WebsiteDetail::first();
      return view('auth.admin-login',['details'=>$details]);
   }
   public function login(Request $request){
      $this->validate($request, [
         'email' => 'required|email',
         'password' => 'required|min:6'
      ]);

      if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password], $request->remember)){
         return redirect()->intended(route('admin.dashboard'));
      }
      return redirect()->back()->withErrors(['These credentials do not match our records.']);
   }

   public function logout()
   {
      Auth::guard('admin')->logout();
      return redirect()->route('admin.login');
   }
}
