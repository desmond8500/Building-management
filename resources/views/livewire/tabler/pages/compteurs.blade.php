<div>
    @component('components.tabler.header', ['title'=>'Compteurs', 'subtitle'=>'Immo'])
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCompteur">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
            Compteur <i class="ti ti-plus"></i>
        </a>
        <a class="btn btn-primary" target="_blank" href="{{ route('tabler.appartement_compteurs_pdf') }}">
           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3"></path> </svg>
            PDF
        </a>
    @endcomponent

    <div class="row g-2">
        <div class="col-md-12">
            <div class="input-icon">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </span>
                <div class="input-group">
                    <input type="{{ $search_type }}" class="form-control " wire:model="search" placeholder="Rechercher…">
                    <button class="btn btn-primary" wire:click='toggle_type'>
                        {{ ucfirst($search_type) }}
                    </button>
                </div>
            </div>
        </div>
        @foreach ($compteurs as $key => $compteur)
            <div class="col-md-4">
                <div class="card">
                    <div class="p-2">
                        @if ($compteur_id == $compteur->id)
                            <div class="row p-2">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Numéro de compteur </label>
                                    <input type="text" wire:model.defer="cpt_number" class="form-control" placeholder="Numéro du compteur">
                                </div>
                                @error('cpt_number') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="mb-3 form-group col-md-12">
                                    <label class="form-label">Type de compteur</label>
                                    <select wire:model.defer="cpt_type" class="form-control">
                                        <option>EAU</option>
                                        <option>Electricité</option>
                                    </select>
                                    @error('cpt_type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 form-group col-md-12">
                                    <label class="form-label">Appartement Associé</label>
                                    <select wire:model.defer="appartement_id" class="form-control">
                                        @foreach ($apparts as $appart)
                                        <option value="{{ $appart->id }}">{{ $appart->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('appartement_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="float-right">
                                        <button wire:click="$set('compteur_id',0)" class="btn btn-secondary">Fermer <i class="ti ti-trash"></i></button>
                                        <button wire:click="delete" class="btn btn-danger">Supprimer</button>
                                        <button wire:click="update" class="btn btn-primary">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row ">
                                <div class="col">
                                    @isset($compteur->appartement)
                                        <div class="fw-bold">{{ $compteur->appartement->nom }}</div>
                                    @endisset
                                    <div class="display-6">{{ $compteur->reference }}</div>
                                </div>
                                <div class="col-auto">
                                    <div class="text-center">
                                        <div>
                                            <button class="btn btn-outline-primary btn-icon" wire:click="edit('{{ $compteur->id }}')">
                                                <i class="ti ti-edit"></i>
                                            </button>
                                        </div>
                                        <div class="mt-2">
                                            <div class="badge text-white bg-blue">{{ $compteur->type }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    {{-- Modal ========================================================= --}}

    <div wire:ignore.self class="modal modal-blur fade" id="modalCompteur" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form wire:submit.prevent='store' class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un compteur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-md-8">
                        <label class="form-label">Numéro de compteur </label>
                        <input type="text" wire:model.defer="cpt_number" class="form-control" placeholder="Numéro du compteur">
                        @error('cpt_number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 form-group col-md-4">
                        <label class="form-label">Type de compteur</label>
                        <select wire:model.defer="cpt_type" class="form-control">
                            <option>EAU</option>
                            <option>Electricité</option>
                        </select>
                        @error('cpt_type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 form-group col-md-6">
                        <label class="form-label">Appartement Associé</label>
                        <select wire:model.defer="appartement_id" class="form-control">
                            <option value="1">Choisir un appartement</option>
                            @foreach ($apparts as $appart)
                                <option value="{{ $appart->id }}">{{ $appart->nom }}</option>
                            @endforeach
                        </select>
                        @error('appartement_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Fermer</a>
                    <button class="btn btn-primary" data-bs-dismiss="modal">Ajouter le Compteur</button>
                </div>
            </form>
        </div>
    </div>
</div>
