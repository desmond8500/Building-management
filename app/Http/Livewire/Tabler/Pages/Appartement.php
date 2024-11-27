<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Appartement as ModelsAppartement;
use Livewire\Component;

class Appartement extends Component
{
    public $appartement_id;

    function mount($appartement_id){
        $this->appartement_id = $appartement_id;
    }

    public function render()
    {
        return view('livewire.tabler.pages.appartement',[
            'appartement' => ModelsAppartement::find($this->appartement_id),
        ])->extends('app.layout')->section('content');
    }
}
