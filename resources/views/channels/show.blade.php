@extends('app')

@section('content')
    <div class="container">
        <div id="main_channel">
            <div class="row ">
                <h1 class="col-sm-9" ><span class="orange-title">Channel ID:</span> {{ $channel->id }}</h1>
                <div class="col-sm-1">
                    <a  class="btn btn-primary" data-dismiss="modal" href="{{ action('ChannelsController@edit', [ $channel->id] ) }}" role="button"> &nbsp; Edit &nbsp; </a>
                </div>
               <div class="col-sm-1">
                    <a  class="btn btn-danger" data-dismiss="modal"  data-toggle="modal" data-target="#myModal" href="#" role="button"> Delete </a>
                </div>
                <div class="col-sm-1">
                    <a  class="btn btn-success" data-dismiss="modal" href="{{ action('DevicesController@show', [ $channel->device->id] ) }}" role="button"> &nbsp; Back &nbsp; </a>
                </div>
            </div>
            <hr/>
            <div class="row jumbotron">
                <div class="col-sm-7">
                    <h4 class="orange-title">Channel description</h4> <p>{{ $channel->description }}</p>
                </div>
                <div class="col-sm-5">
                    <h4 class="orange-title">Data Type</h4> <p>{{ $channel->dataType->type }} </p><br>


                </div>
            </div>
        </div>
        <div id="data_channel">
            <div class="row ">
                <h2 class="col-sm-10" ><span class="orange-title">Data log</span> </h2>

            </div>
            <br>

            <div class="row ">
                <table id="channel_data"  class="table table-hover">
                    <tr class="active orange-title"><th>Id</th><th>Data</th><th>Updated at</th></tr>
                    @foreach($channel->data as $count => $data)
                        <tr><td>{{ $count }}</td><td>{{ $data->data  }}</td><td>{{ $data->created_at }}</td></tr>
                   @endforeach
                </table>
            </div>
        </div>

        {!! $channel->data->render() !!}
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title orange-title">Delete channel</h4>
                </div>
                <div class="modal-body">
                    <h5 >Do you want to delete the channel?</h5>
                </div>
                <div class="modal-footer">

                    {!! Form::open(['method'=>'DELETE', 'url' => ['channels', $channel->id], 'class'=>'col-sm-8']) !!}
                    {!! Form::submit('Delete', ['class' =>'btn btn-danger', 'data-toggle'=>'modal']) !!}
                    {!! Form::close() !!}

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    </div>
<script>

</script>

@stop
