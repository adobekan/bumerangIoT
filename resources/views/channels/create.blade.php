@extends('app')

@section('content')
    <div class="container">
        <h1><span class="orange-title">Create new channel</span></h1>

        <hr/>
        <div class="panel">
            {!! Form::open(['url' => 'channels','class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}
            @include('channels._form', ['submitButton' => 'Create channel'])  <!--partial view-->

            {!! Form::close() !!}
            @include('errors.list')
        </div>

    </div>
@stop