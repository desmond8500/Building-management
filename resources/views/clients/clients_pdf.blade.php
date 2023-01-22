@extends('contrats.contrat_layout')

@section('title')
    Liste des clients
@endsection

@section('content')
<h3 class="text-center">Liste des clients </h3>



<table class="table  mt-2">
    <thead>
        <tr>
            <th width="20px">#</th>
            <th class="text-nowrap">Prénom et Nom</th>
            <th class="text-nowrap">Identification</th>
            <th class="text-nowrap">Local</th>
            <th class="text-nowrap">Montant</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $key => $client)
        <tr>

            <th>{{ $key+1 }}</th>
            <td>
                <div wire:click="gotoClient('{{ $client->id }}')" type="button">
                    {{ ucfirst($client->prenom) }} {{ strtoupper($client->nom) }}
                </div>
            </td>
            <td>
                <div class="">{{ $client->ci }}</div>
                <div class="text-italic">{{ $client->delivre }}</div>
            </td>
            <td>
                <div>{{ $client->contrat->appartement->nom ?? ''}}</div>
                <div>{{ $client->contrat->appartement->adresse ?? ''}}</div>
            </td>
            <td class="text-right">
                {{ number_format($client->contrat->montant ?? 0, 0, ',', ' ') }} F
            </td>

        </tr>
        @endforeach
    </tbody>
</table>



@endsection
