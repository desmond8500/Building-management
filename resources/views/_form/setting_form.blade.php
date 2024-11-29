<div class="col-md-12 mb-3">
    <div class="form-floating">
        <input type="text" class="form-control" disabled wire:model="key" placeholder="Clé">
        <label class="floating-input">Clé</label>
        @error('key') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>
</div>
<div class="col-md-12 mb-3">
    <div class="form-floating">
        <input type="text" class="form-control" wire:model="value" placeholder="Valeur">
        <label class="floating-input">Valeur</label>
    </div>
    @error('value') <span class='text-danger'>{{ $message }}</span> @enderror
</div>

