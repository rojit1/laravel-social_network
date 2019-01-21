@extends('layouts.app')
@section('content')

       <div class="row">
                <div class="col-md-8" style="margin: auto">
                    <div class="jumbotron">
                        <h1>{{$post->title}}</h1>
                        <img style="width: 50%" src="../storage/images/{{$post->image}}" alt="image" class="img-responsivephp">
                        <br><br>
                        <p>{{$post->body}}</p>
                        <small>
                            <a href="/posts/{{$post->id}}/edit"><button class="btn btn-success">Edit</button></a>
                            <form action="/posts/{{$post->id}}" method="POST" style="display: inline">
                                {{ method_field('DELETE') }}
                               {{csrf_field()}}
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </small>
                    </div>

                    <hr>
                </div>
       </div>

@stop
