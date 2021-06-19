<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Session;

class Admin
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


        /*
        handel  fhad function kanchoofo ay request dayerha utilisateure wach kat7e9e9 condition li lteht wla la 

        si ouii kankemll request dyalii wn3tiih li bgha 

        sinon kan rediregiih feen bghiit b redirect 


        */

    if (!Auth::user()->is_admin) {

Session::flash('info','you don\'t have  Admin permitions');
return redirect()->back();

    }
        return $next($request);
    }
}
