<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $contrat->id }}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $contrat->client_id }}</p>
</div>

<!-- Appartement Id Field -->
<div class="form-group">
    {!! Form::label('appartement_id', 'Appartement Id:') !!}
    <p>{{ $contrat->appartement_id }}</p>
</div>

<!-- Debut Field -->
<div class="form-group">
    {!! Form::label('debut', 'Debut:') !!}
    <p>{{ $contrat->debut }}</p>
</div>

<!-- Fin Field -->
<div class="form-group">
    {!! Form::label('fin', 'Fin:') !!}
    <p>{{ $contrat->fin }}</p>
</div>

