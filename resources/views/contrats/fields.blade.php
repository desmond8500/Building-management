<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::text('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Appartement Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('appartement_id', 'Appartement Id:') !!}
    {!! Form::text('appartement_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debut', 'Debut:') !!}
    {!! Form::text('debut', null, ['class' => 'form-control']) !!}
</div>

<!-- Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fin', 'Fin:') !!}
    {!! Form::text('fin', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contrats.index') }}" class="btn btn-secondary">Cancel</a>
</div>
