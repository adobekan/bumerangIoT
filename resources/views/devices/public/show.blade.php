@extends('app')

@section('content')
    <div class="container">
        <div id="main_device">
            <div class="row ">
                @include('errors.list')

                <h1 class="col-sm-10" ><span class="orange-title">Device Name:</span> {{ $device->name }}</h1>

            </div>
            <hr/>
            <div class="row jumbotron">
                <div class="col-sm-7">
                    <h4 class="orange-title">Device description</h4> <p>{{ $device->description }}</p>
                </div>
                <div class="col-sm-5">
                    <h4 class="orange-title">Device ID</h4> <p>{{ $device->id }} </p><br>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1>Channels</h1><hr>
                @foreach($device->channels as $channel)
                    <div class="col-lg-12 col-md-6 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading ">
                                <b style="color:#2b3e50;">Channel ID :</b> {{ $channel->id }}

                                <p><b style="color:#2b3e50;">Description :</b> {{ substr($channel->description,0,200)}} [{{ $channel->dataType->type }}]</p>


                            </div>
                            <a class="href-link" href="{{ url('publicchannels', $channel->id) }}">
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
            <div class="col-sm-6">
                <h1>Data</h1><hr>
                <div id="last_data">

                </div>
                {!! $channelID !!}

            </div>

        </div>
    </div>


    <!--BumerangJS Worker-->
    {!! Html::script('js/bumerang-worker.js') !!}
    <script>
    </script>

@stop
