@extends('app')

@section('content')
    <div class="container">
        <h1 class="orange-title">Create a new device</h1>
        <hr/>
        <div class="panel">
             {!! Form::open(['url' => 'devices','class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}
                @include('devices._form', ['submitButton' => 'Create Device'])  <!--partial view-->
             {!! Form::close() !!}

            @include('errors.list')

        </div>
    </div>

@stop