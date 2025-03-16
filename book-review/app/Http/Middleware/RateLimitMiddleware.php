<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\RateLimiter;

class RateLimitMiddleware
{
    /**
     * Handle an incoming request.
     * 每分钟只能请求3次接口
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //return $next($request);
        RateLimiter::for('review-book', function (Request $request) {
            return RateLimiter::limit(3)->by($request->ip()); // 或者使用 $request->user()->id 如果是基于用户的限制
        });
        //file_put_contents(public_path()."/test.log",$request->ip());
        if (RateLimiter::tooManyAttempts('review-book', 3)) {
            return response()->json([
                'message' => 'Too many requests, please try again later.'
            ], 429);
        }
 
        RateLimiter::hit('review-book');
 
        return $next($request);
    }
}
