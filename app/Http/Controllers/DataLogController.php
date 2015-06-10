<?php namespace App\Http\Controllers;

use App\Channel;
use App\DataLog;
use App\Device;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\DataLogRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataLogController extends Controller {

    protected $auth;

    /**
     *Define middleware
     */
    public function __construct()
    {

        $this->middleware('APIauthorization',['only'=>['store','get','getLatest']]);
    }

    /**
     * Not used
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect('/');
        }

    }

    /**
     * API handler - get data with ?limit parameter
     *
     * @param Channel $channel
     * @param Request $request
     * @return mixed
     */
    public function get(Channel $channel, Request $request)
    {

        $limit=$request->limit;
        return $channel->data()->latest()->limit($limit)->get()->toJSON();

    }

    /**
     * API handler - get last data
     *
     * @param Channel $channel
     * @return mixed
     */
    public function getLatest(Channel $channel)
    {
        return $channel->data()->latest()->limit('1')->get()->toJSON();
    }

    /**
     * API handler - store data for a device
     * @param DataLogRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(DataLogRequest $request)
    {
        $device =  Device::where('key','=',$request->header('key'))->first();

        $channelIDs= $device->channelsID;
        try {
            foreach($request->data as $key => $val)
            {
                if(!$request->channel_id)
                {
                    $channel_id=$channelIDs[$key]->id;
                }else
                {
                    $channel_id=$request->channel_id[$key];
                }
                $data = new DataLog(['channel_id'=> $channel_id, 'data'=>$val]);
                $data->save();
            }


        }catch(Exception $e)
        {
            return response(json(['error' => 'Data insert error.']),500);
        }
        return response(json_encode(['success' => 'Data inserted.']),200);


    }

}
