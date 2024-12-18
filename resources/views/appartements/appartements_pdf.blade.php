@extends('contrats.contrat_layout')

@section('title')
    Liste des clients
@endsection

@section('content')
<h3 class="text-center">Liste des appartements </h3>



<table class="table  mt-2">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom et lieu</th>
            <th style="width: 80px">Numero</th>
            <th>Accupant</th>
            <th style="width: 80px">Montant</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appartements as $key => $appartement)
        <tr>

            <th>{{ $key+1 }}</th>
            <td>
                {{ $appartement->nom }} / {{ $appartement->niveau }}
                <div class="text-italic">{{ $appartement->adresse ?? '(Adresse)'}}</div>
            </td>
            <td class="text-center">{{ $appartement->numero }}</td>
            <td>
                {{ $appartement->contrat->client->prenom ?? '(Prénom)' }} {{ $appartement->contrat->client->nom ?? 'Nom' }}
                <div class="text-italic">{{ $appartement->contrat->client->ci ?? '(Numéro d\'identité)' }}</div>
            </td>
            <td class="text-right" >{{ number_format($appartement->contrat->montant ?? 0, 0, ',', ' ') }} F</td>

        </tr>
        @endforeach
    </tbody>
</table>



@endsection
