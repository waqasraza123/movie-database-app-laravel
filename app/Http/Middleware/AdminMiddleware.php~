<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\User;
class AdminMiddleware
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
    	if (Auth::check()) {
			
			$adminUser = User::where('email', Auth::user()->email)->first();
			\Log::info('here it goes:'.Auth::user().' whereas '.$adminUser.' and END');
			if (!($adminUser and $adminUser->type == 0))
			{
				return redirect('/dashboard');
			}
			return $next($request);
		}
		else{
			return redirect('/login');
		}
		
    	
        
    }
}
