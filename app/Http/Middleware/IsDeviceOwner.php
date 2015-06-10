<?php namespace App\Http\Middleware;

use App\Device;
use App\Http\Requests\DeviceRequest;
use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class IsDeviceOwner {



    /**
	 * Handle an incoming requests and check if user is device owner.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function handle( $request, Closure $next)
	{
        $deviceUserId= Device::findOrFail($request->segment(2))->user_id;


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
