@extends('app')

@section('content')
    <div class="container">
        <div id="main_channel">
            <div class="row ">
                <h1 class="col-sm-9" ><span class="orange-title">Channel ID:</span> {{ $channel->id }}</h1>

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
                {!! $channel->data->render() !!}
            </div>
        </div>

<script>

</script>

@stop
