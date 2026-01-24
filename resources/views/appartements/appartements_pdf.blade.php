@extends('contrats.contrat_layout')

@section('title')
    Liste des appartements
@endsection

@section('content')
<h3 class="text-center" style="text-transform: uppercase;">Liste des appartements </h3>



<table class="table  mt-2">
    <thead>
        <tr style="background: blueviolet; color:white">
            <th>#</th>
            <th>Nom et lieu</th>
            <th style="width: 80px">Numéro</th>
            <th>Accupant</th>
            <th style="width: 80px">Montant</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appartements->sortBy('numero') as $key => $appartement)
        <tr>

            <th>{{ $key+1 }}</th>
            <td>
                <span >{{ $appartement->nom }} / {{ $appartement->niveau }}</span>
                <div class="text-italic" style="color: gray">{{ $appartement->adresse ?? '(Adresse)'}}</div>
            </td>
            <td class="text-center">{{ $appartement->numero }}</td>
            <td>
                <span >
                    {{ ucfirst($appartement->contrat->client->prenom) ?? '(Prénom)' }} {{ strtoupper($appartement->contrat->client->nom) ?? 'Nom' }}
                </span>
                <div class="text-italic" style="color: gray">{{ $appartement->contrat->client->ci ?? '(Numéro d\'identité)' }}</div>
            </td>
            <td class="text-right" >{{ number_format($appartement->contrat->montant ?? 0, 0, ',', ' ') }} F</td>

        </tr>
        @endforeach
    </tbody>
</table>



@endsection
