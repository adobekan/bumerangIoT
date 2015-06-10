<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('dataType', 'Data type:') !!}
    {!! Form::select('data_type_list', $dataType, null, ['class' => 'form-control']) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::submit($submitButton, ['class'=>'btn btn-primary form-control'])  !!}
</div>