@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10" style="margin: auto">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Search results for {{Request::input('search')}}</h3>
                </div>
                @if(!$user->count())
                    <p>No users found</p>
                    @else
                <div class="card-body">
                    @foreach($user as $users)
                    @include('SearchUser.searchtemplate')
                    <hr>
                    @endforeach
                </div>
                    @endif
            </div>
        </div>
    </div>

@stop