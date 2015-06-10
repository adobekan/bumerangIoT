@extends('app')

@section('content')
    <div class="container">
        <h1><span class="orange-title"> Edit channel:</span> {!! $channel->id !!}</h1>

        <hr/>
        <div class="panel">
            {!! Form::model($channel,['method' => 'PATCH', 'url' => ['channels', $channel->id],'class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}
            @include('channels._form', ['submitButton' => 'Save changes'])  <!--partial view-->

            {!! Form::close() !!}
            @include('errors.list')
        </div>

    </div>
@stop