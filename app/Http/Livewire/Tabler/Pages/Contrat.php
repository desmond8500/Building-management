<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Contrat as ModelsContrat;
use Livewire\Component;

class Contrat extends Component
{
    public $contrat_id;

    function mount($contrat_id)
    {
        $this->contrat_id = $contrat_id;
    }

    public function render()
    {
        return view('livewire.tabler.pages.contrat',[
            'contrat' => ModelsContrat::find($this->contrat_id),
        ])->extends('app.layout')->section('content');
    }
}
