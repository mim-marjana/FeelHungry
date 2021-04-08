<!-- Navigation Starts Here -->
	<nav class="navbar navbar-fixed-top">
	  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="{{route('admin.dashboard')}}"><img src="{{URL::to('assets/img/logo-dash.png')}}" alt=""></a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav">
		       	<li><a href="{{route('admin.dashboard')}}" class="{{{ (Request::is('admin/dashboard') ? 'active' : '') }}} {{{ (Request::is('admin') ? 'active' : '') }}}">Dashboard</a></li>
		        	<li>
		        		<a href="#"
						{{{ (Request::is('admin/home') ? 'class=active' : '') }}}
						{{{ (Request::is('admin/reviews') ? 'class=active' : '') }}}
						{{{ (Request::is('admin/team') ? 'class=active' : '') }}}
						{{{ (Request::is('admin/customers') ? 'class=active' : '') }}}
						{{{ (Request::is('admin/galleries') ? 'class=active' : '') }}}
						{{{ (Request::is('admin/website-details') ? 'class=active' : '') }}}
		        		>Pages <i class="fa fa-angle-down" aria-hidden="true"></i>
		        		</a>
						<ul class="subul">
							<li><a href="{{route('admin.home')}}" >Home</a></li>
							<li><a href="{{route('admin.reviews')}}">Reviews</a></li>
							<li><a href="{{route('admin.team')}}">Team</a></li>
							<li><a href="{{route('admin.customers')}}">Customers</a></li>
							<li><a href="{{route('admin.galleries')}}">Galleries</a></li>
							<li><a href="{{route('admin.details')}}">Site Details</a></li>
						</ul>
		        	</li>
		       		<li><a href="{{route('admin.dish')}}" {{{ (Request::is('admin/dish') ? 'class=active' : '') }}}>Dish</a></li>
		       		<li><a href="{{route('admin.orders')}}" {{{ (Request::is('admin/orders') ? 'class=active' : '') }}} {{{ (Request::is('admin/orders-single-category') ? 'class=active' : '') }}}>Orders</a></li>
		       		<li><a href="{{route('admin.reservations')}}" {{{ (Request::is('admin/reservations') ? 'class=active' : '') }}}>Reservations</a></li>
		       	 	<li><a href="{{route('admin.invoices')}}" {{{ (Request::is('admin/invoices') ? 'class=active' : '') }}}>Invoices</a></li>
		       	 	<li><a href="{{route('admin.messages')}}" {{{ (Request::is('admin/messages') ? 'class=active' : '') }}}>Messages</a></li>
		        </ul>

		    </div>
		     <div class="right-nav">
	        	<div class="avatar">
	        		@if(empty(Auth::user()->avatar))
               	<img src="{{URL::to('assets/img/admins/null.jpg')}}" alt="Admins Photo">
	            @else
	               <img src="{{URL::to('assets/img/admins/'.Auth::user()->avatar.'')}}" alt="">
	            @endif 

	        	</div>
				<ul class="reg-ul">
					<li><a href="{{route('admin.profile')}}">Profile</a></li>
					@if(Auth::user()->role->name == "Super")
					<li><a href="{{route('admin.admins')}}">All Admins</a></li>
					<li><a href="{{route('admin.register')}}">Add New Admin</a></li>
					@endif
					<li><a href="{{route('admin.logout')}}">Logout</a></li>
				</ul>
		    </div>
	 	</div>
	</nav> <!-- Navigation Ends Here -->