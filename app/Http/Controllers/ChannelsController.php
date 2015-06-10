<?php namespace App\Http\Controllers;

use App\Channel;
use App\DataLog;
use App\DataType;
use App\Device;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ChannelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChannelsController extends Controller {


    /**
     * Define middleware
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['latest','publicShow']]);
        $this->middleware('channelOwner',['only'=>['show','edit','update','destroy']]);
        $this->middleware('isPublic',['only'=>['latest']]);
   }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $dataType= DataType::lists('type','id');

        return view('channels.create', compact('dataType'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param ChannelRequest $request
     * @return Response
     */
	public function store( ChannelRequest $request)
	{
        $channel = new Channel($request->all());
        $channel->data_type=$request->data_type_list;

        $device=$channel->device;
        $channel->save();
        $channelID=$device->channelsID()->get()->toJSON();
        $channelID="<script> var channelIDs=" .$channelID . "</script>";
        Session::flash('flash_message','Channel successfully created.');
        $dataType= DataType::lists('type','id');

        return view('devices.show', compact('device','channelID','dataType'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Channel $channel
	 * @return Response
	 */
	public function show(Channel $channel)
    {
        $channel->data = $channel->data()->orderBy('updated_at', 'desc')->paginate(25);

        return view('channels.show', compact('channel'));
	}

    public function publicShow(Channel $channel)
    {
        $channel->data = $channel->data()->orderBy('updated_at', 'desc')->paginate(25);

        return view('channels.public.show', compact('channel'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Channel $channel
     * @return Response
     */
	public function edit(Channel $channel)
	{
        $dataType= DataType::lists('type','id');

        return view('channels.edit',compact('channel', 'dataType'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Channel $channel
     * @param ChannelRequest $request
     * @return Response
     */
	public function update(Channel $channel, ChannelRequest $request)
	{
        $channel->update(['description'=>$request->description,'updated_at'=>$request->updated_at,'data_type'=> $request->data_type_list]);
        $channel->data = $channel->data()->orderBy('updated_at', 'desc')->paginate(25);

        return view('channels.show', compact('channel'));
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Channel $channel
     * @return Response
     * @throws \Exception
     */
	public function destroy(Channel $channel)
    {
        $device = Device::findOrFail($channel->device_id);
		$channel->delete();

        Session::flash('flash_message','Channel successfuly deleted!');
        $channelID=$device->channelsID()->get()->toJSON();
        $channelID="<script> var channelIDs=" .$channelID . "</script>";
        $dataType= DataType::lists('type','id');

        return view('devices.show', compact('device','channelID','dataType'));

	}

    /**
     * Get last data for specific channel
     *
     * @param Channel $channel
     * @return mixed
     */
    public function latest(Channel $channel)
    {
        return $channel->data()->latest()->limit('1')->get()->toJSON();
    }

}
