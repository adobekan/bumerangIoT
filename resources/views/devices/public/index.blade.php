@extends('app')

@section('content')
    <div class="container" >
        <h1><span class="orange-title" >Dashboard -</span> Public devices</h1>
        <hr/>

        @foreach($devices as $device)
            <div class="col-lg-4 col-md-6 ">
                <div class="panel panel-primary  ">
                    <div class="panel-heading device-panel-heading">

                        <h4 class="device-title">{{ $device->name }}</h4>
                        <b>Description</b>
                        <p>{{ substr($device->description,0,100)}} ...</p>
                    </div>
                    <a class="href-link" href="{{ url('public', $device->id) }}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                                    <span class="pull-right">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>

                </div>
            </div>
        @endforeach

    </div>

@stop
