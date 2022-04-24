<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Compteur;
use App\Models\Facture;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Factures extends Component
{
    use WithPagination;
    use WithFileUploads;
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
        $facture = Facture::create([
            'compteur_id' => $this->compteur_id,
            'montant' => $this->montant,
            'date' => $this->date,
            'facture' => $this->facture ?? '0',
            'numero' => $this->numero
        ]);

        if ($this->facture) {
            $dir = "factures/$facture->id";
            $name = $this->facture->getClientOriginalName();
            $this->facture->storeAs("public/$dir", $name);

            $facture->facture = "$dir/$name";
            $facture->save();
        }

        $this->reset('compteur_id', 'montant', 'date', 'facture', 'numero');
    }
    public function edit_facture($id)
    {
        $this->facture_id = $id;
        $facture = Facture::find($id);
        $this->compteur_id = $facture->compteur_id;
        $this->montant = $facture->montant;
        $this->date = $facture->date;
        $this->facture = null;
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

        if ($this->facture) {
            $dir = "factures/$facture->id";
            Storage::disk('public')->deleteDirectory($dir);

            $name = $this->facture->getClientOriginalName();
            $this->facture->storeAs("public/$dir", $name);

            $facture->facture = "$dir/$name";
            $facture->save();
        }

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
