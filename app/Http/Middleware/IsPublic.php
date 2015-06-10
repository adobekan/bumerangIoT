<?php namespace App\Http\Middleware;

use App\Channel;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsPublic {

	/**
	 * Handle an incoming request for latest function from ChannelsController.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $channel= Channel::findOrFail($request->segment(2));

        if(!$channel->device->private){
            return $next($request);
        }
        $deviceUserId=$channel->device->user_id;

        if(Auth::guest())
        {
            return redirect('devices');
        }
        else if(!(Auth::user()->id== $deviceUserId || Auth::user()->isAdministrator()))
        {
            return redirect('devices');
        }
        else
        {
            return $next($request);
        }

    }

}
