<div class="mb-3 col-md-12">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" wire:model.defer="name" />
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="mb-3 col-md-12">
    <label class="form-label">Adresse</label>
    <input type="text" class="form-control" wire:model.defer="address" />
    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div>
    <label class="form-label">Description</label>
    <textarea class="form-control" wire:model.defer="description"></textarea>
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
</div>
