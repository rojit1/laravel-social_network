<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class PeopleController extends Controller
{
    public function showPeople(){
        $users = User::all();
        return view('People.show')->with('users',$users);
    }
}
