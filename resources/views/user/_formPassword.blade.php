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
    {!! Form::submit($submitButton, ['class'=>'btn btn-primary form-control'])  !!}
</div>