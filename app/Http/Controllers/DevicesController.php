<?php namespace App\Http\Controllers;


use App\DataType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Device;

//use Illuminate\Http\Request;
use App\Http\Requests\DeviceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

//use Request;

class DevicesController extends Controller {

    /**
     *Define middleware
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['publicDevices','publicDevicesShow']]);
        $this->middleware('deviceOwner',['except'=>['publicDevices','index','publicDevicesShow','create','store']]);

    }

    //
    /**
     * Get public devices
     *
     * @return \Illuminate\View\View
     */
    public  function publicDevices()
    {

        $devices = Device::where('private','=','0')->get();
        //  Device::latest('created_at')->get();
        return view('devices.public.index', compact('devices'));
    }

    /**
     * Return all devices of authenticated user
     *
     * @return \Illuminate\View\View
     */
    public  function index()
    {

        $devices = Auth::user()->devices()->get();
        //  Device::latest('created_at')->get();
        return view('devices.index', compact('devices'));
    }

    /**
     * Show specific public device
     *
     * @param Device $device
     * @return \Illuminate\View\View
     */
    public function publicDevicesShow(Device $device)
    {
        $channelID=$device->channelsID()->get()->toJSON();
        $channelID="<script> var channelIDs=" .$channelID . "</script>";
        $dataType= DataType::lists('type','id');
        // $device= Device::findOrFail($id);
        return view('devices.public.show', compact('device','channelID','dataType'));
    }

    /**
     * Show device
     *
     * @param Device $device
     * @return \Illuminate\View\View
     */
    public function show(Device $device)
    {
        $channelID=$device->channelsID()->get()->toJSON();
        $channelID="<script> var channelIDs=" .$channelID . "</script>";
        $dataType= DataType::lists('type','id');
        // $device= Device::findOrFail($id);
        return view('devices.show', compact('device','channelID','dataType'));
    }

    /**
     * Create new device
     */
    public function create()
    {
       return view('devices.create');
    }

    /**
     * Store new device POST request
     *
     * @param DeviceRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DeviceRequest $request)
    {

        $device = new Device($request->all());

        // Set the private value if false selected in the form
        /* if(!isset( $input['private']))
         {
             $input['private']=0;
         }*/

        Auth::user()->devices()->save($device);
        $channelID=$device->channelsID()->get()->toJSON();
        $channelID="<script> var channelIDs=" .$channelID . "</script>";
        $dataType= DataType::lists('type','id');


        return view('devices.show', compact('device','channelID','dataType'));
    }

    /**
     * @param Device $device
     * @return \Illuminate\View\View
     */
    public function edit(Device $device)
    {
        // $device = Device::findOrFail($id);
        return view('devices.edit',compact('device'));
    }

    /**
     * Update existing device - PATCH request
     *
     * @param Device $device
     * @param DeviceRequest $request
     * @return \Illuminate\View\View
     */
    public function update(Device $device, DeviceRequest $request)
    {
        //$device = Device::findOrFail($id);

        if(!isset( $request['private']))
        {
            $request['private']=0;
        }

        $device->update($request->all());
        $channelID=$device->channelsID()->get()->toJSON();
        $channelID="<script> var channelIDs=" .$channelID . "</script>";
        $dataType= DataType::lists('type','id');

        return view('devices.show', compact('device','channelID','dataType'));
    }

    /**
     * Remove device DELETE request
     * @param $device
     * @return string
     */
    public function destroy(Device $device)
    {

        $device->delete();
        Session::flash('flash_message', 'Device was successfully deleted!');
        return redirect('devices');
    }

}
