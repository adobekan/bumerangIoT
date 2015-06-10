@extends('app')

@section('content')
    <div class="container">
        <h1><span class="orange-title"> Edit:</span> {!! $user->name !!}</h1>

        <hr/>
        <div class="panel col-sm-6 col-lg-offset-3">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#userData">Data</a></li>
                <li><a data-toggle="tab" href="#userPassword">Password</a></li>

            </ul>
            <div class="tab-content">
                <div id="userData" class="tab-pane fade in active">
                    <h3>User data</h3>
                    {!! Form::model($user,['method' => 'PATCH', 'url' => ['account/data'],'class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}
                    @include('user._formData', ['submitButton'=>'Save changes'])
                    {!! Form::close() !!}
                </div>
                <div id="userPassword" class="tab-pane fade">
                    <h3>User Password</h3>
                    {!! Form::model($user,['method' => 'PATCH', 'url' => ['account/password'],'class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}
                    <div class="form-group">
                        {!! Form::label('old_password', 'Old password:') !!}<br/>
                        {!! Form::input('password','old_password', null, ['class' => 'form-control']) !!}

                    </div>
                    @include('user._formPassword', ['submitButton' => 'Change password'])  <!--partial view-->

                    {!! Form::close() !!}
                </div>

            </div>
            @include('errors.list')
        </div>

    </div>


@stop