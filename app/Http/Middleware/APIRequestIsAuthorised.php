<?php namespace App\Http\Middleware;

use App\Channel;
use App\Device;
use App\User;
use Closure;

class APIRequestIsAuthorised {

	/**
	 * Handle an incoming requests for the API access.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $device = $request->isMethod('GET') ? Channel::findOrFail($request->segment(3))->device : Device::where('key', '=', $request->header('key'))->firstOrFail();
        //check if device is public and if it's true allow only GET request
        if(!$device->private && $request->isMethod('GET')){
            return $next($request);
        }
        if($device!=null && $device->user->accessKey == $request->header('access-key'))
        {
            if($request->channel_id)
            {
                foreach($request->channel_id as $channel_id)
                {
                    if($device->channels()->where('id','=',$channel_id)->firstOrFail()==null)
                    {
                        return response(json_encode(['error'=>'Please check your IDs.']),401);
                    }
                }
            }
            return $next($request);
        }

        return response(json_encode(['error'=>'Please check your API keys.']),401);

	}

}
