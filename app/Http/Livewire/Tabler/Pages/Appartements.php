<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\appartement;
use App\Models\Appartement as ModelsAppartement;
use Livewire\Component;
use Livewire\WithPagination;

class Appartements extends Component
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
        return view('livewire.tabler.pages.appartements',[
            'appartements' => ModelsAppartement::where('nom', 'like', '%' . $this->search . '%')->paginate(10),
        ])->extends('app.layout')->section('content');
    }

    public $appart_id = 0;
    public $nom, $numero, $niveau = 'RDC', $description, $adresse;
    public function store_appart()
    {
        ModelsAppartement::create([
            'nom' => $this->nom,
            'numero' => $this->numero,
            'niveau' => $this->niveau,
            'adresse' => $this->adresse,
        ]);
        $this->reset('nom', 'numero', 'niveau', 'adresse');
    }

    public function edit($id)
    {
        $this->appart_id = $id;
        $appart = ModelsAppartement::find($id);
        $this->nom = $appart->nom;
        $this->numero = $appart->numero;
        $this->niveau = $appart->niveau;
        $this->adresse = $appart->adresse;
    }
    public function update()
    {
        $appart = ModelsAppartement::find($this->appart_id);
        $appart->nom = $this->nom;
        $appart->numero = $this->numero;
        $appart->niveau = $this->niveau;
        $appart->adresse = $this->adresse;

        $appart->save();

        $this->reset('appart_id', 'nom', 'numero', 'niveau','adresse');
    }
    public function delete()
    {
        $instance = ModelsAppartement::find($this->appart_id);
        $instance->delete();
    }
}
