<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckSession
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
        $url = route('get.sale');

        $response = Http::withHeaders([
            'Authorization' => $request->input('Authorization'),
        ])->get($url)->json();

        if (! isset($response['error'])) {
            return $next($request);
        }

        // return abort(403);
        return redirect()->route('login.page');
    }
}