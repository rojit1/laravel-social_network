@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3>Edit Articles</h3>
                </div>
                <div class="card-body">

                    <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$post->title}}">
                        </div>

                        <div class="form-group">
                            <label for="title">Body</label>
                            <textarea name="body" class="form-control" rows="10">{{$post->body}}</textarea>
                        </div>
                        <img style="width: 10%" src="../../storage/images/{{$post->image}}" alt="image" class="img-responsivephp">
                        <div class="form-group">
                            <input type="file" name="image">
                        </div>
                        <input type="submit" name="create" value="Update" class="btn btn-success">
                    </form>

                </div>
            </div>

        </div>
    </div>
@stop