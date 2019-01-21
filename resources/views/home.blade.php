@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Hello,{{Auth()->user()->username}} &nbsp; <a href="/posts/create"><button class="btn btn-success">Create Post</button></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>You can find your post here</p>
                        <hr>
                    @if(count($posts)>0)
                        @foreach($posts as $post)
                            <div class="row">
                                <div class="col-md-10" style="margin: auto">
                                    <div class="jumbotron">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img style="width: 100%" src="storage/images/{{$post->image}}" alt="image" class="img-responsivephp">
                                            </div>
                                            <div class="col-md-7">
                                                <h2 style="display:inline"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                                                
                                                <p>{{$post->body}}</p>
                                                <small>posted on: {{$post->created_at}}</small>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                </div>
                            </div>
                            
                        @endforeach
                    @else
                        <p>No content found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
