<?php

namespace App\Http\Livewire\Tabler;

use App\Models\Appartement;
use App\Models\Batiment;
use App\Models\Compteur;
use App\Models\Contrat;
use App\Models\Facture;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.tabler.index',[
            'cards' => $this->getResume(),
        ])->extends('app.layout')->section('content');
    }

    function getResume(){
        $batiments = Batiment::count();
        $appartements = Appartement::count();
        $compteurs = Compteur::count();
        $factures = Facture::count();
        $contrats = Contrat::count();
        return (object) array(
            (object) array('name' => 'Batiments', 'route'=>'batiments', 'icon'=> '', 'count'=> $batiments),
            (object) array('name' => 'Appartements', 'route'=>'appartements', 'icon'=> '', 'count'=> $appartements),
            (object) array('name' => 'Compteurs', 'route'=>'compteurs', 'icon'=> '', 'count'=> $compteurs),
            (object) array('name' => 'Factures', 'route'=>'factures', 'icon'=> '', 'count'=> $factures),
            (object) array('name' => 'Contrats', 'route'=>'contrats', 'icon'=> '', 'count'=> $contrats),
        );
    }
}
