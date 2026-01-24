<div>
    @component('components.tabler.header', ['title'=>'Clients', 'subtitle'=>'Immo'])
        {{-- @env('local')
            <button class="btn btn-primary" wire:click="initClients()">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                Clients
            </button>
        @endenv --}}
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#immoClient">
            <i class="ti ti-plus"></i>
            Client
        </a>
        <a class="btn btn-primary" href="{{ route('tabler.clients_pdf') }}" target="_blank">
            <i class="ti ti-file-type-pdf"></i>
            PDF
        </a>
    @endcomponent

    <div class="row g-2">
        <div class="col">
            <div class="input-icon">
                <input type="text" class="form-control form-control-rounded" wire:model.live="search" placeholder="Chercher ">
                <span class="input-icon-addon">
                    <i class="ti ti-search"></i>
                </span>
            </div>
        </div>

        <div class="w-100"></div>

        @foreach ($clients as $key => $client)
            @if ($client_id == $client->id)
                <div class="col-md-6">
                    <div class="card card-body ">
                        <div class="row p-2">
                            <div class="form-group col-md-5 mb-3">
                                <label class="form-label">Prénom du client </label>
                                <input type="text" wire:model.defer="prenom" class="form-control" placeholder="Prénom">
                            </div>
                            <div class="form-group col-md-5 mb-3">
                                <label class="form-label">Nom du client </label>
                                <input type="text" wire:model.defer="nom" class="form-control" placeholder="nom">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">Statut</label>
                                <select wire:model.defer="statut" class="form-control">
                                    <option value="0">Parti</option>
                                    <option value="1">Résident</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label class="form-label">Numéro d'identité</label>
                                <input type="text" wire:model.defer="ci" class="form-control" placeholder="Numéro de carte d'identité">
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label class="form-label">Délivrance</label>
                                <input type="text" wire:model.defer="delivre" class="form-control"
                                    placeholder="Date et lieu de délivrance">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Genre</label>
                                <select wire:model.defer="genre" class="form-control">
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="text-end">
                                    <button wire:click="$set('client_id',0)" class="btn btn-secondary">Fermer</button>
                                    <button wire:click="delete" class="btn btn-danger">Supprimer</button>
                                    <button wire:click="update" class="btn btn-primary">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="col-md-4">
                    <div class="card p-2">
                        @if ($client->statut)
                            {{-- Actif  --}}
                        @else
                            {{-- Inactif  --}}
                            <div class="card-status-top bg-danger"></div>
                        @endif
                        <div class="row">
                            <div class="col-auto">
                                <span class="btn btn-icon" >
                                    <i class="ti ti-user"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div wire:click="gotoClient('{{ $client->id }}')" type="button">
                                    <div class="fw-bold">{{ ucfirst($client->prenom) }} {{ strtoupper($client->nom) }}</div>
                                    @if ($client->genre == 'femme') Femme @else Homme @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-primary btn-icon" wire:click="edit('{{ $client->id }}')">
                                    <i class="ti ti-edit"></i>
                                </button>
                            </div>
                            <div class="w-100 border"></div>
                            <div class="col">
                                <div><b>ID:</b> {{ $client->ci ?? '(Numéro D\'identité)'}}</div>
                                <div><b>Delivrance:</b> {{ $client->delivre ?? '(Date de délivrance)'}}</div>
                                <div>{{ $client->contrat->appartement->nom ?? '(Nom Local)'}} - {{ $client->contrat->appartement->adresse ?? '(Adresse du local)'}}</div>
                            </div>
                            <div class="col-auto">
                                <span class="fw-bold" style="font-size: 18px">{{ number_format($client->contrat->montant ?? 0, 0, ',', ' ') }} F</span>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        @endforeach

        <div class="col-12">
            <div class="card p-2">
                {{ $clients->links() }}
            </div>
        </div>
    </div>


    <div class="modal modal-blur fade" id="immoClient" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label">Prénom du client </label>
                        <input type="text" wire:model.defer="prenom" class="form-control" placeholder="Prénom">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label">Nom du client </label>
                        <input type="text" wire:model.defer="nom" class="form-control" placeholder="nom">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label class="form-label">Numéro d'identité</label>
                        <input type="text" wire:model.defer="ci" class="form-control" placeholder="Numéro de carte d'identité">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label class="form-label">Délivrance</label>
                        <input type="text" wire:model.defer="delivre" class="form-control" placeholder="Date et lieu de délivrance">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Genre</label>
                        <select wire:model.defer="genre" class="form-control">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button wire:click="store" class="btn btn-primary" data-bs-dismiss="modal">Ajouter le Client</button>
                </div>
            </div>
        </div>
    </div>
</div>
