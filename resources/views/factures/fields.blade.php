<!-- Compteur Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compteur_id', 'Compteur Id:') !!}
    {!! Form::text('compteur_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Montant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant', 'Montant:') !!}
    {!! Form::text('montant', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

<!-- Facture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facture', 'Facture:') !!}
    {!! Form::text('facture', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('factures.index') }}" class="btn btn-secondary">Cancel</a>
</div>
