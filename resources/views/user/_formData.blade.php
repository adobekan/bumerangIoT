
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>
<div class="form-group">
        {!! Form::label('access_key', 'API access key - ') !!}<a href="javascript:void(0)" onclick="randomKey('accessKey')"> Refresh</a>
        {!! Form::text('accessKey', null, ['class' => 'form-control']) !!}
    </div>

<br/>
<div class="form-group">
    {!! Form::submit($submitButton, ['class'=>'btn btn-primary form-control'])  !!}
</div>