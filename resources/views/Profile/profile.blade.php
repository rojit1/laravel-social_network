@extends('layouts.app')
<style type="text/css">
	img{
		width:300px;
		border-radius: 100%;
		box-shadow: 3px 3px 3px orange;
	}
</style>
@section('content')
	<div class="row">
		<div class="col-md-10" style="margin:auto">
			<div class="card">
				<div class="card-header text-center">
					<h2>{{$user->name}}</h2>
				</div>
				<div class="card-body text-center">

				<img src="../storage/profilePicture/{{$user->profile->profile_picture}}" class="img-responsive">
					<br><br>
					<p>Email : {{$user->email}}</p>
					<p>Date of Birth : {{$user->dob}}</p>
					<p>Location : {{$user->profile->location}}</p>
					<p>Hobbies : {{$user->profile->hobbies}}</p>
					<p>Bio : {{$user->profile->bio}}</p>
				</div>
			</div>
		</div>
	</div>
@endsection