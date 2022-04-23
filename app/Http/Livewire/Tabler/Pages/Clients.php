<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
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
        return view('livewire.tabler.pages.clients', [
            'clients' => Client::paginate(10),
        ])->extends('app.layout')->section('content');
    }

    public $prenom, $nom, $genre = 'homme';
    public $client_id;
    public function store()
    {
        Client::create([
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'genre' => $this->genre
        ]);
        $this->reset('prenom', 'nom');
    }

    public function edit($id)
    {
        $this->client_id = $id;
        $client = Client::find($id);
        $this->prenom = $client->prenom;
        $this->nom = $client->nom;
        $this->genre = $client->genre;
    }
    public function update()
    {
        $client = Client::find($this->client_id);
        $client->prenom = $this->prenom;
        $client->nom = $this->nom;
        $client->genre = $this->genre;
        $client->save();
        $this->reset('prenom', 'nom', 'client_id');
    }
    public function delete()
    {
        $client = Client::find($this->client_id);
        $client->delete();
    }
}
