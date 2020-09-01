<?php

namespace App\Http\Middleware;

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
        //
        //return redirect('login');
      //  $data=$request->route()->parameters();
      //$data=$request->user()->name;
      // print_r($data);die();

        if($request->age>30){
           echo "success";
        }else{
            echo "fail";
        }
       

        return $next($request);
    }
}
