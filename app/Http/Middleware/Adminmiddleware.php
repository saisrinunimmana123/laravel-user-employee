<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Adminmiddleware
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
       if(auth::user()->role == 1){
         return $next($request);
        // return view('employee.viewNonAdminEmployee',['Nonadmin'=>$Nonadmin]);
       }

       // else if(auth::user()->role == 0){
       //  return $next($request);

       // }
       else
       {
        return redirect('adminpage_404_Error');
       } 
    }
}
