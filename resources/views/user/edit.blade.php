@extends('app')

@section('content')
    <div class="container">
        <div class="row" >
            <h1 class="col-sm-10"><span class="orange-title"> Edit:</span> {!! $user->name !!}</h1>
            <div class="col-sm-1">
                <a  class="btn btn-danger" data-dismiss="modal"  data-toggle="modal" data-target="#myModal" href="#" role="button"> Delete </a>

            </div>
            <div class="col-sm-1">
                <a  class="btn btn-success" data-dismiss="modal" href="{{ action('UserController@index' ) }}" role="button"> &nbsp; Back &nbsp; </a>
            </div>
        </div>
        <hr>
        <div class="panel col-sm-6 col-lg-offset-3">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#userData">Data</a></li>
                <li><a data-toggle="tab" href="#userPassword">Password</a></li>

            </ul>
            <div class="tab-content">
                <div id="userData" class="tab-pane fade in active">
                    <h3>User data</h3>
                    {!! Form::model($user,['method' => 'PATCH', 'url' => ['user/data', $user->id],'class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}
                    <div class="form-group">
                        {!! Form::label('type', 'UserType:') !!}
                        {!! Form::select('user_type_list', $userType, null, ['class' => 'form-control']) !!}
                    </div>
                    @include('user._formData', ['submitButton'=>'Save changes'])
                    {!! Form::close() !!}
                </div>
                <div id="userPassword" class="tab-pane fade">
                    <h3>User Password</h3>
                    {!! Form::model($user,['method' => 'PATCH', 'url' => ['user/password', $user->id],'class'=>'form-horizontal', 'style'=>'padding:50px;'] ) !!}
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

                    {!! Form::open(['method'=>'DELETE', 'url' => ['user',$user->id], 'class'=>'col-sm-8']) !!}
                    {!! Form::submit('Delete', ['class' =>'btn btn-danger', 'data-toggle'=>'modal']) !!}
                    {!! Form::close() !!}

                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@stop