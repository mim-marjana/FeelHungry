@include('admin.includes.header')
	@include('admin.includes.admin-nav')

	<!-- Main Container Starts -->
	<div class="container" id="admin-main">
      @yield('content')
   </div>
   
@include('admin.includes.footer')