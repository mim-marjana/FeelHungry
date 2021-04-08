

<nav class="navbar navbar-default">
	<div class="container-fluid">
 		<!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
      		</button>
      		<a class="navbar-brand" href="{{route('home')}}">
      			<img src="{{URL::to('assets/img/logo-bold.png')}}" alt="">
      		</a>
    	</div>

    	<!-- Collect the nav links, forms, and other content for toggling -->

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

	       	<ul class="nav navbar-nav">
		        <li><a href="{{route('home')}}" class="{{{(Request::is('/') ? 'active' : '') }}} {{{(Request::is('home') ? 'active' : '') }}}">Home</a></li>
		        <li><a href="{{route('about')}}" class="{{{(Request::is('about') ? 'active' : '') }}}">About</a></li>
		        <li><a href="{{route('menu')}}" class="{{{(Request::is('menu') ? 'active' : '') }}}">Menu</a></li>
		        <li><a href="{{route('reservation')}}" class="{{{(Request::is('reservation') ? 'active' : '') }}}">Reservation</a></li>
		        <li><a href="{{route('galleries')}}" class="{{{(Request::is('galleries') ? 'active' : '') }}}">Gallery</a></li>
		        <li><a href="{{route('contact')}}" class="{{{(Request::is('contact') ? 'active' : '') }}}">Contact</a></li>
	       	</ul>

			</div>

			<ul class="right-nav">
	  		<li><a href="{{route('cart')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a><span id="cartQty">{{Session::has('cartQty')? Session::get('cartQty') : 0}}</span></li>

	  		<li class="user-nav">
	  			<a href="#" onclick="return false" class="user-avatar">
	  				@if(Auth::check())
	  					@if(!empty(Auth::user()->avatar))
	  						<img src="{{URL::to('assets/img/users/'. Auth::user()->avatar.'')}}" alt="">
						@else
							<img src="{{URL::to('assets/img/users/null.jpg')}}" alt="">
	  					@endif

	  				@else
						<i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 20px;"></i>
	  				@endif
	  				
	  			</a>
	 
	  			<ul>
					@guest
	  				 	<li><a href="{{route('login')}}">Sign in</a></li>
	  					<li><a href="{{route('register')}}">Sign up</a></li>
	  				 @else
	  				 	<li><a href="{{route('user.profile')}}">Profile</a></li>
	  				 	<li><a href="{{route('user.orders')}}">Orders</a></li>
	  				 	<li><a href="{{route('user.logout')}}">Logout</a></li>
	  				 @endguest
	  			</ul>
	  		</li>
	  	</ul>
	</div><!-- /.container-fluid -->
</nav>