@extends('app')

@section('content')
    <div class="container">
        <h1><span class="orange-title"> Edit:</span> {!! $device->name !!}</h1>

        <hr/>
        <div class="panel">
        {!! Form::model($device,['method' => 'PATCH', 'url' => ['devices', $device->id],'class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}
            @include('devices._form', ['submitButton' => 'Save changes'])  <!--partial view-->

        {!! Form::close() !!}
        @include('errors.list')
        </div>

    </div>
@stop