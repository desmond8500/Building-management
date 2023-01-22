<div>
    @component('components.tabler.header', ['title'=>'Clients', 'subtitle'=>'Immo'])
        @env('local')
            <button class="btn btn-primary" wire:click="initClients()">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                Clients
            </button>
        @endenv
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Clients</h3>
                    <div class="card-actions">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#immoClient">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                            Client
                        </a>
                        <a class="btn btn-primary" href="{{ route('tabler.clients_pdf') }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path> <line x1="9" y1="9" x2="10" y2="9"></line> <line x1="9" y1="13" x2="15" y2="13"></line> <line x1="9" y1="17" x2="15" y2="17"></line> </svg>
                            PDF
                        </a>
                    </div>
                </div>
                <div class="input-icon">
                    <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <circle cx="10" cy="10" r="7" /> <line x1="21" y1="21" x2="15" y2="15" /> </svg>
                    </span>
                    <input type="text" class="form-control form-control-sm" wire:model="search" placeholder="Rechercher…">
                </div>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-nowrap">Prénom et Nom</th>
                            <th class="text-nowrap">Identification</th>
                            <th class="text-nowrap">Local</th>
                            <th class="text-nowrap">Montant</th>
                            <th class="text-nowrap">Statut</th>
                            <th width="20px" class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $key => $client)
                        <tr>
                            @if ($client_id == $client->id)
                                <td colspan="6" >
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
                                                <option value="0">Libre</option>
                                                <option value="1">Occupé</option>
                                            </select>
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
                                        <div class="col-md-12 mt-2">
                                            <div class="text-end">
                                                <button wire:click="$set('client_id',0)" class="btn btn-secondary">Fermer</button>
                                                <button wire:click="delete" class="btn btn-danger">Supprimer</button>
                                                <button wire:click="update" class="btn btn-primary">Modifier</button>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            @else
                                <th>{{ $key+1 }}</th>
                                <td>
                                    <div wire:click="gotoClient('{{ $client->id }}')" type="button">
                                        {{ ucfirst($client->prenom) }} {{ strtoupper($client->nom) }}
                                    </div>
                                </td>
                                <td>
                                    <div>{{ $client->ci ?? '(Numéro D\'identité)'}}</div>
                                    <div>{{ $client->delivre ?? '(Date de délivrance)'}}</div>
                                </td>
                                <td>
                                    <div>{{ $client->contrat->appartement->nom ?? '(Nom Local)'}}</div>
                                    <div>{{ $client->contrat->appartement->adresse ?? '(Adresse du local)'}}</div>
                                </td>
                                <td>{{ number_format($client->contrat->montant ?? 0, 0, ',', ' ') }} F</td>
                                <td>
                                    @if ($client->statut)
                                        Actif
                                    @else
                                        Inactif
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-outline-primary btn-icon" wire:click="edit('{{ $client->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /> <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /> <line x1="16" y1="5" x2="19" y2="8" /> </svg>
                                    </button>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">{{ $clients->links() }}</div>
            </div>
        </div>
        <div class="col-md-4"></div>
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
                        <select wire:model="genre" class="form-control">
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
