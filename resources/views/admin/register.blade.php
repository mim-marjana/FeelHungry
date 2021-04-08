@extends('admin.layouts.main')
@section('content')

<section class="row " id="admin-reg">
    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
        <form class="form form-1 row" method="POST" action="{{route('admin.register.submit')}}">
            {{ csrf_field() }}

            <div class="col-md-12">
                <h1 class="header-1">Add New Admin</h1>
            </div>

            <div class="col-md-6">
                <label>First Name</label>
                <input  type="text" class="form-control" name="first_name" required>
            </div>
            <div class="col-md-6">
                <label >Last Name</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>

            <div class="col-md-12">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" required>
            </div>

            <div class="col-md-12">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn1">
                    Add Admin
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
