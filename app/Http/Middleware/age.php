<?php

namespace App\Http\Middleware;

use Illuminate\Session\Middleware\StartSession;

use DB;
use Closure;

class age
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
        

       if(!session()->has('data')){
          // echo "hello";die();
           return redirect('/');
       }

       
    return $next($request);
       
    }
}
