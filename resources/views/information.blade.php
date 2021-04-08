@extends('layouts.mainDark')


@section('title')
Checkout Information
@endsection


@section('content')
<section class="row checkout-info">

    <form class="form form-1 col-md-12 col-sm-12 col-xs-12" action="{{route('checkout.info.submit')}}" method="POST"> 

        <div class="row billing">
            <div class="col-md-12 col-sm-12 col-xs-12 t-center">
                <h1 class="heading1">Billing Information</h1>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="billing_fname"  class="form-control" placeholder="First Name*" value="{{$user->first_name}} " required >
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="billing_lname"  class="form-control" placeholder="Last name*" value="{{$user->last_name}} " required >
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="email" name="billing_email" class="form-control" placeholder="Email*" value="{{$user->email}} " required >
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="phone" name="billing_phone" class="form-control" placeholder="Phone*" value="{{$user->phone}} " required >
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" name="billing_address" class="form-control" placeholder="Address*" value="{{$user->address}} " required >
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
                <input type="text" name="billing_area" class="form-control" placeholder="Area *" value="{{$user->area}} " required >
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
                <input type="text" name="billing_city"  class="form-control" placeholder="City*" value="{{$user->city}}" required >
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
                <input type="text" name="billing_postCode" class="form-control" value="{{$user->zip}} " placeholder="POST Code" required >
            </div>
        </div>



        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 t-center">
                <h1 class="heading1">Shipping Information</h1>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" name="shipping_fname"  class="form-control" placeholder="First Name*" value="{{old('shipping_fname')}}" required >
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" name="shipping_lname"  class="form-control" placeholder="Last name*" value="{{old('shipping_lname')}}" required >
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="phone" name="shipping_phone" class="form-control" placeholder="Phone*" value="{{old('shipping_phone')}}" required >
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" name="shipping_address" class="form-control" placeholder="Address*" value="{{old('shipping_address')}}" required >
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
                <input type="text" name="shipping_area" class="form-control" placeholder="Area *" value="{{old('shipping_area')}}" required >
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
                <input type="text" name="shipping_city"  class="form-control" placeholder="City*" value="Sylhet" required readonly >
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6">
                <input type="text" name="shipping_postCode" class="form-control" value="{{old('shipping_postCode')}}" placeholder="POST Code" required >
            </div>
            {{csrf_field()}}
            <div class="col-md-12 col-sm-12 col-xs-12 t-center">
                <button class="btn1" type="submit" value="submit">Checkout</button>
            </div>
        </div>
    </form>
</section>
@endsection