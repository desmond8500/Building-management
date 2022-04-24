<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $facture->id }}</p>
</div>

<!-- Compteur Id Field -->
<div class="form-group">
    {!! Form::label('compteur_id', 'Compteur Id:') !!}
    <p>{{ $facture->compteur_id }}</p>
</div>

<!-- Montant Field -->
<div class="form-group">
    {!! Form::label('montant', 'Montant:') !!}
    <p>{{ $facture->montant }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $facture->date }}</p>
</div>

<!-- Facture Field -->
<div class="form-group">
    {!! Form::label('facture', 'Facture:') !!}
    <p>{{ $facture->facture }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $facture->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $facture->updated_at }}</p>
</div>

