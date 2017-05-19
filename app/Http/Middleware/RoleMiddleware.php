<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles_id)
    {
        if(Auth::check()){ // check if the user is logged in

            $roles_id = explode('|', $roles_id);                // Explode roles based on parameter given on route

            foreach($roles_id as $role_id){                     // Loop each roles based on parameter given on route
                if(Auth::user()->roles_id == $role_id){ #If roles id matched, return next request
                    return $next($request);
                }
            }

            #If roles doesnt match, then redirect to user page based on roles
            if(Auth::user()->roles_id == 0){                // If roles id == 2, redirect to /dekan
              return redirect('/pensyarah-senarailaporan');
            }

            if(Auth::user()->roles_id == 1){                // If roles id == 2, redirect to /ketuajabatan
              return redirect('/pensyarah-senarailaporan');
            }
        }

        return redirect('/login');
    }
}
