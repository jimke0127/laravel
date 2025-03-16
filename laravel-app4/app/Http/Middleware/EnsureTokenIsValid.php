<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if ($request->input('token') !== 'my-secret-token') {
        if (Auth::check()) {

            //$data = ["status" => 0,"msg" => "token error"];
            
            $request->attributes->set('custom_data', ["status" => 1,"msg" => "token ok","data"=>Auth::user()]);

        }else{

            //$data = ["status" => 1];
            $request->attributes->set('custom_data', ["status" => 0,"msg" => "token error","data"=>Auth::user()]);
        
        }
        //session(['middleware_data' => $data]);

        return $next($request);
    }
}
