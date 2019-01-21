<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class SearchController extends Controller
{
    public function searchResult(Request $request){
        $search = $request->input('search');
       if(!$search){
            return redirect('/people');
       }
        $user = User::where('name','LIKE', "%{$search}%")
        ->orWhere('username','LIKE',"%{$search}%")->get();
        return view('Search.result')->with('user',$user);
    }
}
