<?php
namespace App\Http\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Session;
use Closure;

class CheckSession{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    
    public function handle($request, Closure $next){
       if(!Session::has('token')){
           return redirect('/');
       }
        
        return $next($request);
    }
}
