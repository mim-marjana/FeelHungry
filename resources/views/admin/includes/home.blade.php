@extends('admin.layouts.main')
@section('content')
<section class="row" id="admin-slider">
	<h1 class="header-1">Home page Slider</h1>
	<div class="slider-container fulscreen-slider" id="admin-slider-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide carousel-slide" style="background-image:url(../assets/img/photos/11.jpg)">
				<div class="admin-edit">
					<i title="Edit The Slide" class="fa fa-pencil editSlide" aria-hidden="true"></i>
					<i title="Delete The Slide" class="fa fa-times" id="deleteSlide" aria-hidden="true"></i>
				</div>
				<div class="mask"></div>
				<div class="content">
					<h1>Chase the flavors</h1><br>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p><br>
					<button class="btn1">Contact Us</button>
				</div>
			</div>

			<div class="swiper-slide carousel-slide" style="background-image:url(../assets/img/photos/15.jpg)">
				<div class="admin-edit">
					<i title="Edit The Slide" class="fa fa-pencil editSlide" aria-hidden="true"></i>
					<i title="Delete The Slide" class="fa fa-times" id="deleteSlide" aria-hidden="true"></i>
				</div>
				<div class="mask"></div>
				<div class="content">
					<h1>Where taste meets the myth</h1><br>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p><br>
					<a href="places.html"><button class="btn1">View All Places</button></a>
				</div>
			</div>
		</div>

		<!-- Pagination -->
		<div class="swiper-pagination"></div>

		<!-- Navigation buttons -->
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>

	<button class="btn1 addSlide">Add New Slide</button>


	<!-- Add New Slide Form -->
	<div class="form-3-wrapper" id="add-Slide-form">
		<img src="../assets/img/nav-close.png" id="close-add-slide-form" class="close-form" alt="">
		<h2>Add New Slide</h2>
		<form class="row form-3 left" method="POST" enctype="multipart/form-data">
			<div class="col-md-12">
				<label for="name">Slide Photo</label>
				<input type="file" name="slide-photo" class="form-control" >
			</div>
			<div class="col-md-12">
				<label for="name">Slide Heading</label>
				<input type="text" name="slide-heading" class="form-control" >
			</div>
			<div class="col-md-12">
				<label for="slide-description">Slide Description</label>
				<textarea name="slide-description" class="form-control"></textarea>
			</div>

			<div class="col-md-12 text-center">
				<button class="btn1 text-left">Add Slide</button>
			</div>
		</form>
	</div>
	<!-- Add New Slide Form -->



	<!-- Edit The Slide -->
	<div class="form-3-wrapper" id="edit-Slide-form">
		<img src="../assets/img/nav-close.png" id="close-slide-form" class="close-form" alt="">

		<h2>Update The Slide</h2>

		<form class="row form-3 left" method="POST" enctype="multipart/form-data">
			<div class="col-md-12">
				<label for="name">Slide Photo</label>
				<input type="file" name="slide-photo" class="form-control" >
			</div>
			<div class="col-md-12">
				<label for="name">Slide Heading</label>
				<input type="text" name="slide-heading" class="form-control" >
			</div>
			<div class="col-md-12">
				<label for="slide-description">Slide Description</label>
				<textarea name="slide-description" class="form-control"></textarea>
			</div>

			<div class="col-md-12 text-center">
				<button class="btn1 text-left">Update Slide</button>
			</div>
		</form>
	</div>
	<!-- Edit The Slide -->
</section>

<!-- Home Page Slider -->
<!-- Home Page Slider -->





<section class="row admin-home-section">
	<h1 class="header-1">Short Navigation</h1>
	<ul>
		<?php $i = 1;
		while($i<5):?>
		<li>
			<img src="../assets/img/photos/<?php echo$i;?>.jpg" alt="">
			<h2>Breakfast</h2>
			<div class="admin-edit">
				<i title="Edit The Slide" class="fa fa-pencil editShortNav" aria-hidden="true"></i>
				<i title="Delete The Slide" class="fa fa-times" id="deleteSlide" aria-hidden="true"></i>
			</div>
		</li>

		<?php $i++; endwhile ?>
	</ul>

	<div class="form-3-wrapper" id="edit-short-nav-form">
		<img src="../assets/img/nav-close.png" id="close-short-nav-form" class="close-form" alt="">

		<h2>Update The Navigation</h2>

		<form class="row form-3 left" method="POST" enctype="multipart/form-data">
			<div class="col-md-12">
				<label for="name">Navigation Photo</label>
				<input type="file" name="nav-photo" class="form-control">
			</div>
			<div class="col-md-12">
				<label for="name">Navigation Heading</label>
				<input type="text" name="nav-heading" class="form-control">
			</div>
			<div class="col-md-12">
				<label>Navigation Anchor</label>
				<input type="text" name="nav-anchor" class="form-control">
			</div>

			<div class="col-md-12 text-center">
				<button class="btn1 text-left">Update Navigation</button>
			</div>
		</form>
	</div>
</section>



<section class="row admin-home-section">
	<h1 class="header-1">Most Loved Dish</h1>
	<ul>
		<?php $i = 1;
		while($i<5):?>
		<li>
			<img src="../assets/img/photos/<?php echo$i;?>.jpg" alt="">
			<h3>Banana Sour Cream Pancakes Sour Cream.</h3>
			<div class="admin-edit">
				<i title="Delete The Slide" class="fa fa-times" id="deleteSlide" aria-hidden="true" style="background:#b50505"></i>
			</div>
		</li>
		<?php $i++; endwhile ?>

	</ul>

	<button class="btn1 addLovedDish">Add New Dish to the List</button>
	<div class="form-3-wrapper" id="add-loved-dish-form">
		<img src="../assets/img/nav-close.png" id="close-loved-dish-form" class="close-form" alt="">

		<h2>Add Dish to Most Loved Dish</h2>

		<form class="row form-3 left" method="POST" >
			<div class="col-md-12">
				<label for="name">Select The Dish Category</label>
				<select name="category" id="category" class="form-control">
					<option value="1">Indian Cousine</option>
					<option value="1">Tandoori DIshes</option>
					<option value="1">Breakfast</option>
					<option value="1">Lunch</option>
					<option value="1">Dinner</option>
				</select>
			</div>
			<div class="col-md-12">
				<label for="name">Select The Dish</label>
				<select name="category" id="category" class="form-control">
					<option value="1">Indian Cousine</option>
					<option value="1">Tandoori DIshes</option>
					<option value="1">Breakfast</option>
					<option value="1">Lunch</option>
					<option value="1">Dinner</option>
				</select>
			</div>
			<div class="col-md-12 text-center">
				<button class="btn1 text-left">Add to the list</button>
			</div>
		</form>
	</div>
</section>


<section class="row admin-home-section">
	<h1 class="header-1">Chef Special Dish</h1>
	<ul>
		<?php $i = 1;
		while($i<5):?>
		<li>
			<img src="../assets/img/photos/<?php echo$i;?>.jpg" alt="">
			<h3>Banana Sour Cream Pancakes Sour Cream.</h3>
			<div class="admin-edit">
				<i title="Delete The Slide" class="fa fa-times" id="deleteSlide" aria-hidden="true" style="background:#b50505"></i>
			</div>
		</li>
		<?php $i++; endwhile ?>

	</ul>

	<button class="btn1 addChefDish">Add New Dish to the List</button>
	<div class="form-3-wrapper" id="add-chef-dish-form">
		<img src="../assets/img/nav-close.png" id="close-chef-dish-form" class="close-form" alt="">

		<h2>Add Dish to Chef Special</h2>

		<form class="row form-3 left" method="POST" >
			<div class="col-md-12">
				<label for="name">Select The Dish Category</label>
				<select name="category" id="category" class="form-control">
					<option value="1">Indian Cousine</option>
					<option value="1">Tandoori DIshes</option>
					<option value="1">Breakfast</option>
					<option value="1">Lunch</option>
					<option value="1">Dinner</option>
				</select>
			</div>
			<div class="col-md-12">
				<label for="name">Select The Dish</label>
				<select name="category" id="category" class="form-control">
					<option value="1">Indian Cousine</option>
					<option value="1">Tandoori DIshes</option>
					<option value="1">Breakfast</option>
					<option value="1">Lunch</option>
					<option value="1">Dinner</option>
				</select>
			</div>
			<div class="col-md-12 text-center">
				<button class="btn1 text-left">Add to the list</button>
			</div>
		</form>
	</div>
</section>
@endsection