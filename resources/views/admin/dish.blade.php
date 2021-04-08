@extends('admin.layouts.main')
@section('content')


<!-- The Form for Adding New Dish Item -->
	<div class="add-dish" id="add-dish">
		<img src="../assets/img/add.png" alt="">
	</div>
	<div class="form-3-wrapper" id="add-dish-form">
		<img src="../assets/img/nav-close.png" id="close-dish-form" class="close-form" alt="">
		<h2>Add New Dish Item</h2>
		<form class="row form-3 left" action="{{route('add.dish')}}" method="POST" enctype="multipart/form-data">
			<div class="col-md-8">
				<label for="name">Dish Name</label>
				<input type="text" name="name" class="form-control" placeholder="Write the name of the Dish" required>
			</div>
			<div class="col-md-4">
				<label for="name">Photo</label>
				<input type="file" name="photo" class="form-control" placeholder="Dish Photo">
			</div>
			<div class="col-md-6">
				<label for="category">Dish Catagory</label>
				<select name="category" id="category" class="form-control" required>
					<option value="">Select the Dish Catagory</option>
					@foreach($dishCategory as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-6">
				<label for="price">Dish Price</label>
				<input type="text" name="price" class="form-control" placeholder="Price of the Dish" required>
			</div>
			<div class="col-md-12">
				<label for="details">Dish Description</label>
				<textarea name="details" class="form-control" placeholder="Write some details about the Dish"></textarea>
			</div>
			{{csrf_field()}}
			<div class="col-md-12 text-center">
				<button class="btn1 text-left" type="submit">Submit</button>
			</div>
		</form>
	</div>
<!-- The Form for Adding New Dish Item -->





<!-- The Form for Editing a Dish Item -->
	<div class="form-3-wrapper" id="edit-dish-form">
		<img src="../assets/img/nav-close.png" id="close-dish-edit-form" class="close-form" alt="">
		<h2>Edit <span class="name-heading" style="color: #00c397"></span></h2>
		<form class="row form-3 left" action="{{route('edit.dish.submit')}}" method="POST" enctype="multipart/form-data">
			<div class="col-md-8">
				<label for="name">Dish Name</label>
				<input type="text" name="name" class="form-control name" value="">
			</div>
			<div class="col-md-4">
				<label for="name">Photo</label>
				<input type="file" name="photo" class="form-control">
			</div>
			<div class="col-md-6">
				<label for="category">Dish Catagory</label>
				<select name="category" id="category" class="form-control">
					<option value="">Select the Dish Catagory</option>
					@foreach($dishCategory as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-6">
				<label for="price">Dish Price</label>
				<input type="text" name="price" class="form-control price" value="">
			</div>
			<div class="col-md-12">
				<label for="description">Dish Description</label>
				<textarea name="details" class="form-control details"  value=""></textarea>
			</div>
			{{csrf_field()}}
			<input type="hidden" name="dish_id" class="dish_id" value="">

			<div class="col-md-12 text-center">
				<button class="btn1 text-left" type="submit">Submit</button>
			</div>
		</form>
	</div>
<!-- The Form for Editing a Dish Item -->



<!-- The Form for Adding New Catagory Item -->
	<div class="form-3-wrapper" id="catagory-form">
		<img src="../assets/img/nav-close.png" id="close-cat-form" class="close-form" alt="">
		<h2>Add New Category</h2>
		<form class="row form-3 center" action="{{route('add.dish-category')}}" method="POST">
			<input type="text" name="name" class="form-control" placeholder="Category Name">
			{{csrf_field()}}
			<div class="col-md-12 text-center">
				<button class="btn1 text-left" type="submit">Submit</button>
			</div>

		</form>
	</div>
<!-- The Form for Adding New Catagory Item -->



<!-- The Form for Editing Catagory Item -->
	<div class="form-3-wrapper" id="edit-catagory-form">
		<img src="../assets/img/nav-close.png" id="close-cat-form" class="close-form" alt="">
		<h2>Edit Category</h2>
		<form class="row form-3 center" action="{{route('update.category')}}" method="POST">
			<input type="text" name="name" class="form-control name" placeholder="Category Name">
			{{csrf_field()}}
			<input type="hidden" name="id" value="" class="id"> 
			<div class="col-md-12 text-center">
				<button class="btn1" type="submit">Submit</button>
			</div>

		</form>
	</div>
<!-- The Form for Adding New Catagory Item -->




<section class="row" id="dish-categories">

	@if(Session::has('success'))
		<div class="col-md-12">
			<p class="success-message">{{Session::get('success')}}</p>
		</div>
	@endif
	@if(Session::has('error'))
		<div class="col-md-12">
			<p class="error-message">{{Session::get('error')}}</p>
		</div>
	@endif

	<h1 class="header-1">Dish Categories</h1>
	<ul>
		@foreach($dishCategory as $category)
		<li><span>{{$category->id}}</span>{{{$category->name}}}
			<div class="edit">
				<a href="{{route('dish.category.delete',['id'=>$category->id])}}"><i title="Delete This Category" class="fa fa-times" aria-hidden="true"></i></a>
				<i title="Edit this Category" class="fa fa-pencil edit-cat" aria-hidden="true" data-id="{{$category->id}}"></i>
			</div>
		</li>
		@endforeach
	</ul>
	<button class="btn1" id="addCat" >Add New Category</button>
</section>




	<section class="row" id="dish-items">
		<div class="col-md-12 text-center"><h1 class="header-1">Al Dish Items</h1></div>


		<table class="table table-inverse">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Name</th>
		      <th>Catagory</th>
		      <th>Price</th>
		      <th>Edit</th>
		    </tr>
		  </thead>
		  <tbody class="table-hover">
		
			@foreach($dishes as $dish)
		    <tr>
		      <td class="serial">{{$dish->id}}</td>
		      <td class="dish-name">{{$dish->name}}</td>
		      <td style="color: #00c397;font-weight:bold;">{{$dish->dish_category->name}}</td>
		      <td>{{$dish->price}}<span class="taka">&#2547;</span></td>
		      <td>
					<i title="View Details" class="fa fa-eye viewDish" aria-hidden="true" data-id="{{$dish->id}}"></i>

		      	<a href="{{route('dish.delete',['id'=>$dish->id])}}"><i title="Delete Dish" class="fa fa-times"  aria-hidden="true"></i></a>

		      	<i title="Edit Dish" class="fa fa-pencil editDish" aria-hidden="true" data-id="{{$dish->id}}"></i>

		      </td>
		    </tr>
		   @endforeach


		  </tbody>
		</table>
	
	{{$dishes->links()}}

	

	<div class="viewDishDetails">
		<i class="fa fa-times details-close" aria-hidden="true"></i>
		<div class="dish-photo">
			<img src="{{URL::to('assets/img/dish/1.jpg')}}" alt="">
		</div>
		<div class="dish-details">
			<table class="table">
		    	<tbody>
		        <tr>
		          <th>Name</th>
		            <td class="name"></td>
		        </tr>
		        <tr>
		          <th>Category</th>
		            <td style="color: #00c397;font-weight:bold;" class="category"></td>
		        </tr>
		        <tr>
		          <th>Details</th>
		            <td class="desc"></td>
		        </tr>
		        <tr>
		          <th>Price</th>
		            <td class="price"></td>
		        </tr>
		        
		    	</tbody>
			</table>
		</div>
	</div>


	</section>
@endsection

@section('scripts')
<script>
	var viewDish = '{{route('view.dish.details')}}';
	var editDish = '{{route('edit.dish')}}';
	var editDishCategory = '{{route('edit.dish.category')}}';
	var imageUrl = '{{URL::to('assets/img/dish/')}}/';
	var token = '{{Session::token()}}';
</script>
@endsection