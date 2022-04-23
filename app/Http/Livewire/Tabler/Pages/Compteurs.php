<?php

namespace App\Http\Livewire\Tabler\Pages;

use Livewire\Component;

class Compteurs extends Component
{
    public function render()
    {
        return view('livewire.tabler.pages.compteurs', [

        ])->extends('app.layout')->section('content');
    }
}
