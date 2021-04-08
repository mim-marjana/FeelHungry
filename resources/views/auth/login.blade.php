@extends('layouts.main')

@section('title')
Login
@endsection


@section('content')
<section class="row" id="customer-signin">
    <div class="layer"></div>
    <div class="signin-form">
        <img src="{{URL::to('assets/img/'.$details->logo.'')}}" alt="">
        <form class="form-2" action="{{ route('login') }}" method="POST">
            {{ csrf_field() }}
            <div class="input-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                <input type="text" name="email" class="form-control" id="inlineFormInputGroup" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class="input-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group-addon"><i class="fa fa-unlock" aria-hidden="true"></i></div>
                <input type="password" name="password" class="form-control" id="inlineFormInputGroup" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block">
                       {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
            <div class="input-group row">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class=""><span>Remember Me</span>
            </div>
            <button class="btn1 form-control" type="submit">Sign in</button>
            <a href="{{ route('password.request') }}">Forgot Your Password ? </a>
        </form>
        <a href="{{ route('register') }}"><button class="btn1 form-control" >Join Us</button></a>
    </div>
</section>
@endsection
