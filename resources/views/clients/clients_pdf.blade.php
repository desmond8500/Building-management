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
            <th>Prénom et Nom</th>
            <th>Identification</th>
            <th>Local</th>
            <th style="width: 80px">Montant</th>
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
                <div class="">{{ $client->ci ?? '(Numéro d\'identité)'}}</div>
                <div class="text-italic">{{ $client->delivre ?? '(Date de délivrance)'}}</div>
            </td>
            <td>
                <div>{{ $client->contrat->appartement->nom ?? '(Nom Local)'}}</div>
                <div>{{ $client->contrat->appartement->adresse ?? '(Adresse du local)'}}</div>
            </td>
            <td class="text-right">
                {{ number_format($client->contrat->montant ?? 0, 0, ',', ' ') }} F
            </td>

        </tr>
        @endforeach
    </tbody>
</table>



@endsection
