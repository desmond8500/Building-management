@extends('contrats.contrat_layout')

@section('title')
    Liste des clients
@endsection

@section('content')
<h3 class="text-center">Liste des clients </h3>



<table class="table  mt-2">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-nowrap">Nom</th>
            <th class="text-nowrap">Numero</th>
            <th class="text-nowrap">Accupant</th>
            <th class="text-nowrap">Montant</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appartements as $key => $appartement)
        <tr>

            <th>{{ $key+1 }}</th>
            <td>
                {{ $appartement->nom }} / {{ $appartement->niveau }}
                <div class="text-italic">{{ $appartement->adresse }}</div>
            </td>
            <td class="text-center">{{ $appartement->numero }}</td>
            <td>
                {{ $appartement->contrat->client->prenom ?? 'N/A' }} {{ $appartement->contrat->client->nom ?? 'N/A' }}
                <div class="text-italic">{{ $appartement->contrat->client->ci ?? 'N/A' }}</div>
            </td>
            <td class="text-right">{{ number_format($appartement->contrat->montant ?? 0, 0, ',', ' ') }} F</td>

        </tr>
        @endforeach
    </tbody>
</table>



@endsection
