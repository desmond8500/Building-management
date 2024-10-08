<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Appartement;
use App\Models\Compteur;
use Livewire\Component;
use Livewire\WithPagination;

class Compteurs extends Component
{
    // Bof
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $search = '';
    public $search_type = 'text';

    function toggle_type(){
        if ($this->search_type == 'text') {
            $this->search_type = 'number';
        }else{
            $this->search_type = 'text';
        }
    }

    public function render()
    {
        return view('livewire.tabler.pages.compteurs', [
            'compteurs' => Compteur::where('reference', 'like', '%' . $this->search . '%')->paginate(10),
            'apparts' => Appartement::all(),
        ])->extends('app.layout')->section('content');
    }

    // Compteur
    public $cpt_type = 'EAU', $cpt_number, $appartement_id;
    public $compteur_id = 0;

    protected $rules = [
        'cpt_type' => ['required'],
        'cpt_number' => ['required'],
        'appartement_id' => ['required', 'integer'],
    ];

    public function store()
    {
        $this->validate($this->rules);
        Compteur::create([
            'type' => $this->cpt_type,
            'reference' => $this->cpt_number,
            'appartement_id' => $this->appartement_id,
        ]);
        $this->reset('cpt_number', 'cpt_type', 'appartement_id');
    }
    public function edit($id)
    {
        $this->compteur_id = $id;
        $compteur = Compteur::find($id);
        $this->cpt_type = $compteur->type;
        $this->cpt_number = $compteur->reference;
        $this->appartement_id = $compteur->appartement_id;
    }
    public function update()
    {
        $this->validate($this->rules);
        $compteur = Compteur::find($this->compteur_id);
        $compteur->type = $this->cpt_type;
        $compteur->reference = $this->cpt_number;
        $compteur->appartement_id = $this->appartement_id;

        $compteur->save();

        $this->reset('compteur_id', 'cpt_number','cpt_type', 'appartement_id');
    }
    public function delete()
    {
        $instance = Compteur::find($this->compteur_id);
        $instance->delete();
    }
}
