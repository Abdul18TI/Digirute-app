<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            //jika name dari route tidak mengandung "rt"
            if ($request->routeIs('rt.*') ) {
                return route('rt.login');
            //jika name dari route tidak mengandung "r"
            }else if($request->routeIs('rw.*')){
                return route('rw.login');
            }else{
                return route('warga.login');
            }
            // return route('warga.login');
        }
    }
}
