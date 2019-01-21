@extends('layouts.app')
@section('content')

<div class="row">
		<div class="col-md-10" style="margin:auto">
			<div class="card">
				<div class="card-header text-center">
					<h4>Hello {{auth::user()->name}}, update your profile</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="/profile-create" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<input class="form-control" type="text" name="location" placeholder="Location">
						</div>

						<div class="form-group">
							<textarea class="form-control" rows="5" name="hobbies" placeholder="Your hobbies here"></textarea>
						</div>

						<div class="form-group">
							<textarea class="form-control" rows="5" name="bio" placeholder="Your bio here"></textarea>
						</div>
						<div class="form-group">
							<label>Profile picture</label><br>
							<input type="file" name="profile_picture">
						</div>
							<input class="btn btn-primary" type="submit" name="cp" value="Create">
					</form>
					
				</div>
			</div>
		</div>
	</div>

@stop