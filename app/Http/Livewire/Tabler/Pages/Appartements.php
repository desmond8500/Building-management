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
    public $nom, $numero, $niveau = 'RDC', $description, $adresse, $statut;
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
        $this->statut = $appart->statut;
    }
    public function update()
    {
        $appart = ModelsAppartement::find($this->appart_id);
        $appart->nom = $this->nom;
        $appart->numero = $this->numero;
        $appart->niveau = $this->niveau;
        $appart->adresse = $this->adresse;
        $appart->statut = $this->statut;

        $appart->save();

        $this->reset('appart_id', 'nom', 'numero', 'niveau','adresse');
    }
    public function delete()
    {
        $instance = ModelsAppartement::find($this->appart_id);
        $instance->delete();
    }

    public function initAppart()
    {
        $apparts = (object) array(
            ['nom' => 'Appartement 1', 'numero' => 'A1', 'niveau' => 1, 'adresse'=>'yarakh'],
            ['nom' => 'Appartement 2', 'numero' => 'A2', 'niveau' => 1, 'adresse'=>'yarakh'],
            ['nom' => 'Appartement 3', 'numero' => 'A3', 'niveau' => 1, 'adresse'=>'yarakh'],
        );

        foreach ($apparts as $appart) {
            appartement::create([
                'nom' => $appart['nom'],
                'numero' => $appart['numero'],
                'niveau' => $appart['niveau'],
                'adresse' => $appart['adresse'],
            ]);
        }
    }
}
