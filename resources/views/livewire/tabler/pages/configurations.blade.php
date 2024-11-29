<div>
    @component('components.tabler.header', ['title'=>'Configurations', 'subtitle'=>'Immo'])
    <button class="btn btn-primary" wire:click="init">Init</button>
    @endcomponent

    <div class="row g-2">
        @foreach ($settings as $setting)
            <div class="col-md-3">
                <div class="card p-2">
                    @if ($selected_id == $setting->id)
                    <div class="row">
                        @include('_form.setting_form')
                        <div class="col-md-12">
                            <button class="btn btn-secondary" wire:click="$set('selected_id', 0)">Annuler</button>
                            <button class="btn btn-primary" wire:click=update_setting>Modifier</button>
                        </div>
                    </div>
                    @else
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between"><b>Clé :</b> <span>{{ ucfirst($setting->key) }}</span> </div>
                                <div class="d-flex justify-content-between"><b>Valeur :</b> <span>{{ $setting->value }}</span> </div>
                            </div>
                            <div class="col-auto">
                                <button class='btn btn-primary btn-icon' wire:click="edit_setting({{ $setting->id }})"><i class='ti ti-edit'></i></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</div>
