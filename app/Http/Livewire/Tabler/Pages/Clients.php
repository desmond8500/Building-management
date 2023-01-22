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
            'clients' => Client::where('prenom', 'like', '%' . $this->search . '%')
                    ->orWhere('nom', 'like', '%' . $this->search . '%')
                    ->paginate(10),
        ])->extends('app.layout')->section('content');
    }

    public $prenom, $nom, $genre = 'homme', $ci, $delivre, $statut;
    public $client_id;

    public function store()
    {
        Client::create([
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'genre' => $this->genre,
            'ci' => $this->ci,
            'delivre' => $this->delivre,
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
        $this->statut = $client->statut;
    }
    public function update()
    {
        $client = Client::find($this->client_id);
        $client->prenom = $this->prenom;
        $client->nom = $this->nom;
        $client->genre = $this->genre;
        $client->ci = $this->ci;
        $client->delivre = $this->delivre;
        $client->statut = $this->statut;
        $client->save();
        $this->reset('prenom', 'nom', 'client_id');
    }
    public function delete()
    {
        $client = Client::find($this->client_id);
        $client->delete();
    }

    public function gotoClient($client_id)
    {
        return redirect()->route("tabler.client",["client_id"=>$client_id]);
    }

    public function initClients()
    {
        $clients = (object) array(
            ['prenom' => 'Desmond', 'nom' => 'Miles', 'genre' => 'Homme'],
            ['prenom' => 'Sam', 'nom' => 'Fisher', 'genre' => 'Homme'],
            ['prenom' => 'Alastor', 'nom' => 'Maugrey', 'genre' => 'Homme'],
        );

        foreach ($clients as $client) {
            Client::create([
                'prenom' => $client['prenom'],
                'nom' => $client['nom'],
                'genre' => $client['genre'],
            ]);
        }
    }
}
