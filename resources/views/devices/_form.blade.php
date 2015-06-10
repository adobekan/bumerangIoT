<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('key', 'API Device key - ') !!}<a href="javascript:void(0)" onclick="randomKey('key')"> Refresh</a>
    {!! Form::text('key', null, ['class' => 'form-control']) !!}
</div>
<div class="checkbox">
    {!! Form::checkbox('private', 1, true, ['style' => 'margin-left:0px!important;']) !!}
    {!! Form::label('private', 'Private') !!}
</div>
<br/>
<div class="form-group">
    {!! Form::submit($submitButton, ['class'=>'btn btn-primary form-control'])  !!}
</div>