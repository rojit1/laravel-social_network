@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-8" style="margin:auto">
            <div class="card">
                <div class="card-header">
                     <form action="/search" method="POST" class="navbar-form navbar-right">
                        {{csrf_field()}}
                        
                        <input style="width:500px; height: 35px; border-radius: 5px" type="text" name="search"  placeholder=" search people">
                        <button type="submit" class="btn btn-danger">Search</button>
                        
                    </form>
                </div>
                <div class="card-body">
                    @if(count($users)>0)

                        <table class="table table-striped" width="100%">
                            <tr>
                                <th>User</th>
                                <th></th>
                            </tr>
                            @foreach($users as $user)
                            <tr>
                                <td><a href="/profile/{{$user->username}}">{{$user->name}}</a></td>
                                <td><a class="btn btn-success" href="#">Follow</a></td></tr>
                            @endforeach
                        </table>


                     @else
                        <p>No users found</p>
                     @endif
                </div>
            </div>
        </div>
    </div>

@stop