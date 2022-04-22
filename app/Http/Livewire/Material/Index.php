<?php

namespace App\Http\Livewire\Material;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.material.index')->extends('app.materialLayout')->section('content');
    }
}
