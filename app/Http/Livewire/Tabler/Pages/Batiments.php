<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Batiment;
use Livewire\Component;

class Batiments extends Component
{
    public $name, $address, $description;

    public function render()
    {
        return view('livewire.tabler.pages.batiments',[
            'batiments' => Batiment::all(),
        ] )->extends('app.layout')->section('content');;
    }

    function store(){
        Batiment::create([
            'name' => ucfirst($this->name),
            'address' => ucfirst($this->address),
            'description' => ucfirst($this->description),
        ]);
    }

    public $batiment_id;

    function edit($batiment_id){
        $this->batiment_id = $batiment_id;
        $batiment = Batiment::find($batiment_id);
        $this->name = $batiment->name;
        $this->address = $batiment->address;
        $this->description = $batiment->description;
    }

    function update(){
        $batiment = Batiment::find($this->batiment_id);

        $batiment->name = ucfirst($this->name);
        $batiment->address = ucfirst($this->address);
        $batiment->description = ucfirst($this->description);
        $batiment->save();
        $this->reset('batiment_id', 'name','address', 'description');
    }

    function close(){
        $this->reset('batiment_id', 'name','address', 'description');
    }
}
