<div>
    @component('components.tabler.header', ['title'=>'Factures', 'subtitle'=>'Immo'])

    @endcomponent

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Factures</h3>
                    <div class="card-actions">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <circle cx="10" cy="10" r="7" /> <line x1="21" y1="21" x2="15" y2="15" /> </svg>
                            </span>
                            <input type="text" class="form-control form-control-sm" wire:model="search" placeholder="Rechercher…">
                        </div>
                    </div>
                </div>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-nowrap">Appartement</th>
                            <th class="text-nowrap">Montant</th>
                            <th class="text-nowrap">Date</th>
                            <th class="text-nowrap">Facture</th>
                            <th width="20px" class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($factures as $key => $facture)
                        <tr>
                            @if ($facture_id == $facture->id)
                                <div class="row p-2">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Compteurs</label>
                                        <select wire:model.defer="compteur_id" class="form-control">
                                            <option value="0">Sélectionnez un compteur</option>
                                            @foreach ( $compteurs as $compteur)
                                            <option value="{{ $compteur->id }}">{{ $compteur->appartement->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Montant</label>
                                        <input type="number" wire:model.defer="montant" class="form-control" placeholder="">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Date</label>
                                        <input type="date" wire:model.defer="date" class="form-control" placeholder="">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Facture</label>
                                        <input type="file" wire:model.defer="facture" class="form-control" placeholder="">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Numero de facture</label>
                                        <input type="text" wire:model.defer="numero" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <button wire:click="$set('facture_id', 0)" class="btn btn-secondary">Fermer</button>
                                            <button wire:click="delete_facture" class="btn btn-danger">Supprimer</button>
                                            <button wire:click="update_facture" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <th>{{ $key+1 }}</th>
                                <td>{{ $facture->compteur->appartement->nom }}</td>
                                <td>{{ $facture->montant }}</td>
                                <td>{{ $facture->date->format('d-m-Y') }}</td>
                                <td>
                                    <div>
                                        <a href="{{ "storage/$facture->facture" }}" target="blank">{{ $facture->numero }}</a>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-outline-primary btn-icon" wire:click="edit_facture('{{ $facture->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /> <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /> <line x1="16" y1="5" x2="19" y2="8" /> </svg>
                                    </button>
                                </td>

                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-body">
                    {{ $factures->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ajouter une facture</h3>
              </div>
              <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Compteurs</label>
                    <select wire:model.defer="compteur_id" class="form-control">
                        <option value="0">Sélectionnez un compteur</option>
                        @foreach ( $compteurs as $compteur)
                            <option value="{{ $compteur->id }}">{{ $compteur->appartement->nom }} - {{ $compteur->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Montant</label>
                    <input type="number" wire:model.defer="montant" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" wire:model.defer="date" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Facture</label>
                    <input type="file" wire:model.defer="facture" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero de facture</label>
                    <input type="text" wire:model.defer="numero" class="form-control" placeholder="">
                </div>

                <div class="d-flex justify-content-between">
                    <button class="btn btn-secondary" wire:click="reinitialiser">Réinitialiser</button>
                    <button class="btn btn-primary" wire:click="store_facture">Valider</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
