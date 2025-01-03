<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Appartement;
use App\Models\Client;
use App\Models\Contrat;
use Livewire\Component;

class Contrats extends Component
{
    public $client_id, $appartement_id, $montant, $date, $type = 'habitation', $sign1=false, $sign2 =false;
    public $contrat_id, $selected = array();
    public $debut;
    public $fin;

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
        $contrat = Contrat::find($contract_id);
        array_push($this->selected, $contrat);
    }
    public function remove_contract($contrat_id)
    {
        foreach ($this->selected as $key => $selected) {
            if ($key == $contrat_id) {
                unset($this->selected[$key]);
            } else {
            }
        }
    }

    public function add_contract()
    {
        Contrat::firstOrCreate([
            'client_id' => $this->client_id,
            'appartement_id' => $this->appartement_id,
            'montant' => $this->montant,
            'date' => $this->date,
            'type' => $this->type,
            'sign1' => $this->sign1,
            'sign2' => $this->sign2,
        ]);
    }

    public function edit_contract($contrat_id)
    {
        $contrat = Contrat::find($contrat_id);
        $this->contrat_id = $contrat_id;

        $this->client_id = $contrat->client_id;
        $this->appartement_id = $contrat->appartement_id;
        $this->montant = $contrat->montant;
        $this->date = $contrat->date;
        $this->debut = $contrat->debut;
        $this->fin = $contrat->fin;
        $this->type = $contrat->type;
        $this->sign1 = $contrat->sign1;
        $this->sign2 = $contrat->sign2;
    }

    public function update_contract()
    {
        $contrat = Contrat::find($this->contrat_id);

        $contrat->client_id = $this->client_id;
        $contrat->appartement_id = $this->appartement_id;
        $contrat->montant = $this->montant;
        $contrat->date = $this->date;
        $contrat->type = $this->type;
        $contrat->sign1 = $this->sign1;
        $contrat->sign2 = $this->sign2;
        $contrat->debut = $this->debut;
        $contrat->fin = $this->fin;

        $contrat->save();

        $this->reset('contrat_id');
    }

    public function getContract()
    {
        return Contrat::all();
    }
}
