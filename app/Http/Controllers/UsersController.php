<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::where('role_id','=',2)->get();
        return view('admin.user.index',compact('users'));
    }

    public function profile($id){

        $profile = Profile::where('user_id','=',$id)->get();
        $profile = $profile[0];
        // dd($profile);

        return view('admin.user.profile',compact('profile'));
    }
}
