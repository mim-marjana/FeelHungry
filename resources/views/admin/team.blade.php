@extends('admin.layouts.main')
@section('content')
<section class="row" id="team">
	<h1 class="header-1">Meet Our Team</h1>
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
	<ul class="team-list">
		@foreach($team as $member)
		<li>
			<div class="team-photo">
				<img src="{{URL::to('assets/img/team/'.$member->photo.'')}}" alt="">
			</div>
			<div class="content">
				<h3>{{$member->name}}</h3>
				<p>{{$member->designation}}</p>
			</div>
			<div class="admin-edit">
				<i title="Edit Team member" class="fa fa-pencil editMember" aria-hidden="true" data-id="{{$member->id}}"></i>
				<a href="{{route('delete.member',['id'=>$member->id])}}"><i title="Delete the member" class="fa fa-times deleteMember" id="" aria-hidden="true" data-id="{{$member->id}}"></i></a>
			</div>
		</li>	
	@endforeach
	</ul>
	<button class="btn1 addNewMember">Add New Member</button>

	<div class="form-3-wrapper" id="add-member-form">
		<img src="../assets/img/nav-close.png" id="close-member-form" class="close-form" alt="">

		<h2>Add New Team Member</h2>

		<form class="row form-3 left" method="POST" enctype="multipart/form-data" action="{{route('add.team.submit')}}">
			<div class="col-md-6">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" required> 	
			</div>
			<div class="col-md-6">
				<label for="name">Designation</label>
				<input type="text" name="designation" class="form-control" required> 	
			</div>
			<div class="col-md-12">
				<label for="name">Photo</label>
				<input type="file" name="photo" class="form-control" required> 	
			</div>
			{{csrf_field()}}
			<div class="col-md-12 text-center">
				<button class="btn1 text-left" type="submit">Add Member</button>
			</div>
		</form>
	</div>


	<div class="form-3-wrapper" id="edit-member-form">
		<img src="../assets/img/nav-close.png" id="close-edit-member-form" class="close-form" alt="">

		<h2>Edit Member information</h2>

		<form class="row form-3 left" method="POST" action="{{route('update.team.submit')}}" enctype="multipart/form-data">
			<div class="col-md-6">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control name" > 	
			</div>
			<div class="col-md-6">
				<label for="name">Designation</label>
				<input type="text" name="designation" class="form-control designation" > 	
			</div>
			<div class="col-md-12">
				<label for="name">Photo</label>
				<input type="file" name="photo" class="form-control photo" > 
			</div>
			{{csrf_field()}}
			<input type="hidden" value="" name="member_id" class="member_id">
			
			<div class="col-md-12 text-center">
				<button class="btn1 text-left" type="submit">Update Information</button>
			</div>
		</form>
	</div>

</section>
@endsection
@section('scripts')
<script>
	var editTeamMember = '{{route('edit.team')}}';
	var token = '{{Session::token()}}';
</script>
@endsection