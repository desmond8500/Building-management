<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Compteur;
use App\Models\Facture;
use Livewire\Component;
use Livewire\WithPagination;

class Factures extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $search = '';

    public function render()
    {
        return view('livewire.tabler.pages.factures',[
            'factures' => Facture::where('numero', 'like', '%' . $this->search . '%')->paginate(10),
            'compteurs' => Compteur::all(),
        ])->extends('app.layout')->section('content');
    }

    public $compteur_id, $montant, $date, $facture, $numero;
    public $facture_id=0, $facture_form=0;

    public function store_facture()
    {
        Facture::create([
            'compteur_id' => $this->compteur_id,
            'montant' => $this->montant,
            'date' => $this->date,
            'facture' => $this->facture ?? '0',
            'numero' => $this->numero
        ]);

        $this->reset('compteur_id', 'montant', 'date', 'facture', 'numero');
    }
    public function edit_facture($id)
    {
        $this->facture_id = $id;
        $facture = Facture::find($id);
        $this->compteur_id = $facture->compteur_id;
        $this->montant = $facture->montant;
        $this->date = $facture->date;
        $this->facture = $facture->facture;
        $this->numero = $facture->numero;
    }
    public function update_facture()
    {
        $facture = Facture::find($this->facture_id);
        $facture->compteur_id = $this->compteur_id;
        $facture->montant = $this->montant;
        $facture->date = $this->date;
        $facture->facture = $this->facture;
        $facture->numero = $this->numero;

        $facture->save();

        $this->reset('facture_id', 'compteur_id', 'montant', 'date', 'facture', 'numero');
    }
    public function delete_facture(){
        $facture = Facture::find($this->facture_id);
        $facture->delete();
    }
    public function reinitialiser()
    {
        $this->reset('compteur_id', 'montant', 'date', 'facture', 'numero');
    }

}
