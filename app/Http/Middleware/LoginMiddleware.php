<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //Authentication
        //get information from the form and store it in the variable then authenticates
        $email=$request->email;
        $password=$request->password;

        $data=DB::table('users')->where('email','=',$email)->where('password','=',$password)->count();

        //dd($data);

        if($data == '0')
        {
            return redirect()->route('login');
        }

        elseif($data == '1' || ( session()->has('email') && session()->has('password')) )
        {
            session()->put('email',$email);
            session()->put('password',$password);
            return redirect()->route('index');
        }
        return $next($request);
    }
}
