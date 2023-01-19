<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Client;
use Livewire\Component;

class Contrats extends Component
{
    public function render()
    {
        return view('livewire.tabler.pages.contrats',[
            'clients' => Client::all(),
        ])->extends('app.layout')->section('content');
    }

    public function getContract()
    {
        return redirect()->route('tabler.contrat_pdf');
    }
}
