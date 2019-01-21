@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3>Create Articles</h3>
                </div>
                <div class="card-body">
                    <form action="/posts" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Body</label>
                            <textarea name="body" class="form-control" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image">
                        </div>

                        <input type="submit" name="create" value="Post" class="btn btn-primary">
                    </form>

                </div>
            </div>

        </div>
    </div>
@stop