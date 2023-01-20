<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Appartement;
use App\Models\Client;
use App\Models\Contrat;
use Livewire\Component;

class Contrats extends Component
{
    public $client_id, $appartement_id, $montant;

    public function render()
    {
        return view('livewire.tabler.pages.contrats',[
            'contrats' => $this->getContract(),
            'clients' => Client::all(),
            'appartements' => Appartement::all(),
        ])->extends('app.layout')->section('content');
    }

    public function add_contract()
    {
        Contrat::firstOrCreate([
            'client_id' => $this->client_id,
            'appartement_id' => $this->appartement_id,
            'montant' => $this->montant,
        ]);
    }

    public function getContract()
    {
        return Contrat::all();
    }
}
