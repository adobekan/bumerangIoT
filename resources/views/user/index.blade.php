@extends('app')

@section('content')
    <div class="container">
        <div id="main_device">
            <div class="row ">
                @include('errors.list')

                <h1 class="col-sm-10" ><span class="orange-title">List of users</span> </h1>
                <div class="col-sm-1">
                    <a  class="btn btn-primary" data-dismiss="modal" href="{{ action('UserController@create' ) }}" role="button"> &nbsp; New &nbsp; </a>
                </div>

            </div>
            <hr/>
            <div class="row jumbotron">
                <div class="row ">
                    <table id="channel_data"  class="table table-hover">
                        <tr class="active orange-title"><th>Num.</th><th data-sortable="true">User</th><th>Username</th><th>Level</th><th>E-mail</th><th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">Item Operate</th></tr>
                        @foreach($users as $count => $user)
                            <tr data-index={{ $count }}><td>{{ $count }}</td><td>{{ $user->name  }}</td><td>{{ $user->username }}</td><td>{{ $user->userType->type }}</td><td>{{ $user->email }}</td>
                                <td><a href="{{ action('UserController@edit',$user->id) }}">Edit</a> </td></tr>
                        @endforeach
                    </table>
                </div>
                {{ $users->render()}}
            </div>

    </div>







@stop
