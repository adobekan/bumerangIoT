@extends('app')

@section('content')
    <div class="container">
        <div id="main_device">
            <div class="row ">
                @include('errors.list')

                <h1 class="col-sm-10" ><span class="orange-title">Device Name:</span> {{ $device->name }}</h1>
                <div class="col-sm-1">
                    <a  class="btn btn-primary" data-dismiss="modal" href="{{ action('DevicesController@edit', [$device->id] ) }}" role="button"> &nbsp; Edit &nbsp; </a>
                </div>
                <div class="col-sm-1">
                    <a  class="btn btn-danger" data-dismiss="modal"  data-toggle="modal" data-target="#myModal" href="#" role="button"> Delete </a>

                </div>
            </div>
            <hr/>
            <div class="row jumbotron">
                <div class="col-sm-7">
                    <h4 class="orange-title">Device description</h4> <p>{{ $device->description }}</p>
                </div>
                <div class="col-sm-5">
                    <h4 class="orange-title">API key</h4> <p>{{ $device->key }} </p><br>
                    <h4 class="orange-title">Private</h4>
                    <p>
                        @if($device->private )
                            Yes
                        @else
                            No
                        @endif
                    </p>

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
                            <a class="href-link" href="{{ url('channels', $channel->id) }}">
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
                <a  class="href-link" data-dismiss="modal"  data-toggle="modal" data-target="#addChannel" href="#" role="button"><div class="col-lg-12 col-md-6">
                        <div class="panel panel-primary" >
                            <div class="panel-footer small-panel" >
                                <h2 class="text-center ">Add new channel</h2>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-sm-6">
                <h1>Data</h1><hr>
                <div id="last_data">

                </div>
                {!! $channelID !!}

            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title orange-title">Delete device</h4>
                </div>
                <div class="modal-body">
                    <h5 >Do you want to delete the device?</h5>
                </div>
                <div class="modal-footer">

                    {!! Form::open(['method'=>'DELETE', 'url' => ['devices', $device->id], 'class'=>'col-sm-8']) !!}
                    {!! Form::submit('Delete', ['class' =>'btn btn-danger', 'data-toggle'=>'modal']) !!}
                    {!! Form::close() !!}

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    </div>

    <!-- Modal  Add channel-->
    <div class="modal fade" id="addChannel" role="dialog">
        <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title orange-title">Add channel</h4>
                </div>
                <div class="">


                    <div class="panel">



                        {!! Form::open(['device'=> $device->id, 'url' => 'channels','class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}

                            {!! Form::input('hidden','device_id', $device->id) !!}

                        @include('channels._form', ['submitButton' => 'Create channel'])  <!--partial view-->

                        {!! Form::close() !!}




                    </div>

                </div>
            </div>
        </div>

    </div>

    <!--BumerangJS Worker-->
    {!! Html::script('js/bumerang-worker.js') !!}
    {!! Html::script('js/random.js') !!}

    <script>
    </script>

@stop
