@extends('layouts.app')
@section('content')

	<div class="row">
		<div class="col-md-10" style="margin:auto">
			<div class="card">
				<div class="card-header text-center">
					<h4>Hello {{auth::user()->username}}, update your profile</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="/profile-update/{{$profile->id}}" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
						<p>Location</p>
							<input class="form-control" type="text" name="location" value="{{$profile->location}}">
						</div>

						<div class="form-group">
						<p>Hobbies</p>
							<textarea class="form-control" rows="5" name="hobbies">{{$profile->hobbies}}</textarea>
						</div>

						<div class="form-group">
						<p>Bio</p>
							<textarea class="form-control" rows="5" name="bio" placeholder="Your bio here">{{$profile->bio}}</textarea>
						</div>
						<div class="form-group">
							<input type="file" name="profile_picture">
						</div>
							<input class="btn btn-success" type="submit" name="up" value="Update">
					</form>
					
				</div>
			</div>
		</div>
	</div>

@stop