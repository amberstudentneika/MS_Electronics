<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateProductValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

//            $validate = $request->validate([
//                'pname' => 'required',
//                'ptype' => 'string',
//                'pmnumber' => 'string',
//                'pbrand' => 'string',
//                'pimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//                'pcost' => 'required',
//                'ProductDesc' => 'string|max:150',
//            ]);
            redirect(route('create'));


        return $next($request);
    }
}
