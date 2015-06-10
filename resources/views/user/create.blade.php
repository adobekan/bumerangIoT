@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-sm-10 orange-title">Create a new user</h1>
            <div class="col-sm-1">
                <a  class="btn btn-success" data-dismiss="modal" href="{{ action('UserController@index' ) }}" role="button"> &nbsp; Back &nbsp; </a>
            </div>
        </div>
        <hr/>
        <div class="panel col-sm-6 col-lg-offset-3">

            <div class="panel">
                {!! Form::open(['url' => 'user','class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}
                <div class="form-group">
                    {!! Form::label('type', 'UserType:') !!}
                    {!! Form::select('user_type_list', $userType, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('username', 'Username:') !!}
                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('access_key', 'API access key - ') !!}<a href="javascript:void(0)" onclick="randomKey('accessKey')"> Refresh</a>
                    {!! Form::text('accessKey', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}<br/>
                    {!! Form::input('password','password', null, ['class' => 'form-control']) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Password confirmation') !!}<br/>
                    {!! Form::input('password','password_confirmation',null, ['class' => 'form-control']) !!}
                </div>
                <br/>
                <div class="form-group">
                    {!! Form::submit('Create User', ['class'=>'btn btn-primary form-control'])  !!}
                </div>
                {!! Form::close() !!}

                @include('errors.list')

            </div>
        </div>
    </div>

@stop

