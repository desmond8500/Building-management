<div>
    @component('components.tabler.header', ['title'=>'Appartements', 'subtitle'=>'Immo'])
        @env('local')
        <button class="btn btn-primary" wire:click="initAppart()">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Appartement
        </button>
        @endenv
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Appartements</h3>
                <div class="card-actions">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAppart">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                        Ajouter
                    </a>
                    <a class="btn btn-primary" href="{{ route('tabler.appartements_pdf') }}" target="_blank">
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
                            <th class="text-nowrap">Nom</th>
                            <th class="text-nowrap">Numero</th>
                            <th class="text-nowrap">Accupant</th>
                            <th class="text-nowrap">Montant</th>
                            <th class="text-nowrap">Statut</th>
                            <th width="20px" class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appartements as $key => $appartement)
                        <tr>
                            @if ($appart_id == $appartement->id)
                            <div class="row p-3">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Nom l'appartement </label>
                                    <input type="text" wire:model.defer="nom" class="form-control" placeholder="Nom de l'appartement">
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <label class="form-label">Numéro </label>
                                    <input type="text" wire:model.defer="numero" class="form-control" placeholder="Numéro">
                                </div>
                                <div class="mb-3 form-group col-md-2">
                                    <label class="form-label">Niveau</label>
                                    <select wire:model.defer="niveau" class="form-control">
                                        <option>Sous sol</option>
                                        <option>RDC</option>
                                        <option>Mezzanine</option>
                                        <option>Etage 1</option>
                                        <option>Etage 2</option>
                                        <option>Etage 3</option>
                                        <option>Etage 4</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label class="form-label">Statut </label>
                                    <select wire:model.defer="statut" class="form-control">
                                        <option value="0">Libre</option>
                                        <option value="1">Occupé</option>
                                    </select>
                                </div>

                                <div class="mb-3 form-group col-md-12">
                                    <label class="form-label">Adresse</label>
                                    <textarea wire:model.defer="adresse" class="form-control" placeholder="Description" cols="30"
                                        rows="3"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-evenly">
                                        <button wire:click="$set('appart_id', 0)" class="btn btn-secondary">Fermer</button>
                                        <button wire:click="delete" class="btn btn-danger">Supprimer</button>
                                        <button wire:click="update" class="btn btn-primary">Modifier</button>
                                    </div>
                                </div>
                            </div>

                            @else
                            <th>{{ $key+1 }}</th>
                            <td>
                                {{ $appartement->nom }} / {{ $appartement->niveau }}
                                <div class="text-italic">{{ $appartement->adresse ?? '(Adresse)' }}</div>
                            </td>
                            <td>{{ $appartement->numero }}</td>
                            <td>
                                {{ $appartement->contrat->client->prenom ?? '(Prénom)' }} {{ $appartement->contrat->client->nom ?? '(Nom)' }}
                                <div class="text-italic">{{ $appartement->contrat->client->ci ?? '(Numéro d\'identité)' }}</div>
                            </td>
                            <td>{{ number_format($appartement->contrat->montant ?? 0, 0, ',', ' ') }} F</td>
                            <td>
                                @if ($appartement->statut)
                                    Occupé
                                @else
                                    Libre
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-outline-primary btn-icon" wire:click="edit('{{ $appartement->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /> <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /> <line x1="16" y1="5" x2="19" y2="8" /> </svg>
                                </button>
                            </td>

                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-body">
                    {{ $appartements->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal ========================================================= --}}
    <div class="modal modal-blur fade" id="modalAppart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un appartement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-8">
                        <label class="form-label">Nom l'appartement </label>
                        <input type="text" wire:model.defer="nom" class="form-control" placeholder="Nom de l'appartement">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Numéro </label>
                        <input type="text" wire:model.defer="numero" class="form-control" placeholder="Numéro">
                    </div>
                    <div class="mb-3 form-group col-md-6">
                        <label class="form-label">Niveau</label>
                        <select wire:model.defer="niveau" class="form-control">
                            <option>Sous sol</option>
                            <option>RDC</option>
                            <option>Mezzanine</option>
                            <option>Etage 1</option>
                            <option>Etage 2</option>
                            <option>Etage 3</option>
                            <option>Etage 4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label">Adresse </label>
                        <input type="text" wire:model.defer="adresse" class="form-control" placeholder="Adresse">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Fermer</button>
                    <button wire:click="store_appart" class="btn btn-primary" data-bs-dismiss="modal">Ajouter l'Appartement</button>
                </div>
            </div>
        </div>
    </div>

</div>
