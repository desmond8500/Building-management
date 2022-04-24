<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Appartement;
use App\Models\Compteur;
use Livewire\Component;
use Livewire\WithPagination;

class Compteurs extends Component
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
        return view('livewire.tabler.pages.compteurs', [
            'compteurs' => Compteur::where('number', 'like', '%' . $this->search . '%')->paginate(10),
            'apparts' => Appartement::all(),
        ])->extends('app.layout')->section('content');
    }

    // Compteur
    public $cpt_type = 'EAU', $cpt_number, $appartement_id;
    public $compteur_id = 0;

    public function store()
    {
        Compteur::create([
            'type' => $this->cpt_type,
            'reference' => $this->cpt_number,
            'appartement_id' => $this->appartement_id,
        ]);
        $this->reset('cpt_number', 'appartement_id');
    }
    public function edit($id)
    {
        $this->compteur_id = $id;
        $compteur = Compteur::find($id);
        $this->cpt_type = $compteur->type;
        $this->cpt_number = $compteur->number;
        $this->appartement_id = $compteur->appartement_id;
    }
    public function update()
    {
        $compteur = Compteur::find($this->compteur_id);
        $compteur->type = $this->cpt_type;
        $compteur->number = $this->cpt_number;
        $compteur->appartement_id = $this->appartement_id;

        $compteur->save();

        $this->reset('compteur_id', 'cpt_number', 'appartement_id');
    }
    public function delete()
    {
        $instance = Compteur::find($this->compteur_id);
        $instance->delete();
    }
}
