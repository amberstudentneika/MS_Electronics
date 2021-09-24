<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index(){
    //this check if there is an active session and if there is then the sure is redirected to index page
    if( session()->has('email') && session()->has('password')) {
        return view('admin.index');
    }
    else{
        //else user is prompt to login
        return redirect('/admin');
    }
    }

    function logout(Request $request){
        $request->session()->forget('email');
        $request->session()->forget('password');
        session()->regenerateToken();
    return redirect('/admin');
    }
}
