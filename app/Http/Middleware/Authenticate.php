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

        if( $request->is('admin') || $request->is('admin/*') ) {

            return route('admin.login.form');
            
        }

        if( $request->is('company') || $request->is('company/*') ) {

            return route('company.login.form');
            
        }

        if( $request->is('employee') || $request->is('employee/*') ) {

            return route('employee.login.form');
            
        }

        if ($request->expectsJson()) {

            return response()->json(['error' => 'Unauthenticated.'], 401);

        }
    }
}
