<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Appartement;
use App\Models\Client;
use App\Models\Contrat;
use Livewire\Component;

class Contrats extends Component
{
    public $client_id, $appartement_id, $montant;
    public $contrat_id, $selected = array();

    public function render()
    {
        return view('livewire.tabler.pages.contrats',[
            'contrats' => $this->getContract(),
            'clients' => Client::all(),
            'appartements' => Appartement::all(),
        ])->extends('app.layout')->section('content');
    }

    public function selectContract($contract_id)
    {
        if (empty($this->selected)) {
            array_push($this->selected, $contract_id);
        }else{
            foreach ($this->selected as $selected) {
                if ($selected == $contract_id) {
                    unset($selected);
                } else {
                    array_push($this->selected, $contract_id);
                }
            }
        }

    }

    public function add_contract()
    {
        Contrat::firstOrCreate([
            'client_id' => $this->client_id,
            'appartement_id' => $this->appartement_id,
            'montant' => $this->montant,
        ]);
    }

    public function edit_contract($contrat_id)
    {
        $contrat = Contrat::find($contrat_id);
        $this->contrat_id = $contrat_id;

        $this->client_id = $contrat->client_id;
        $this->appartement_id = $contrat->appartement_id;
        $this->montant = $contrat->montant;
    }

    public function update_contract()
    {
        $contrat = Contrat::find($this->contrat_id);

        $contrat->client_id = $this->client_id;
        $contrat->appartement_id = $this->appartement_id;
        $contrat->montant = $this->montant;

        $contrat->save();

        $this->reset('contrat_id');
    }

    public function getContract()
    {
        return Contrat::all();
    }
}
