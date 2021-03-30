<div>
    @foreach($inputs as $key => $value)
        <div class="row">
            <div class="form-group col-4">
                <label class="form-label">Couleur*</label>
                <input type="text" class="form-control" placeholder="Couleur"
                       name="color[]" wire:model.defer="color.{{ $value }}" required>
            </div>
            <div class="form-group col-2">
                <label class="form-label">Qte*</label>
                <input type="text" class="form-control" placeholder="000"
                       name="quantity[]" required wire:model.defer="quantity.{{ $value }}">
            </div>
            <div class="form-group col-1">
                <div class="d-flex align-items-end h-75">
                    <button class="btn btn-danger ml-auto" {{$key == 0 ? 'disabled' : ''}} type="button"
                            wire:click="remove({{$key}})" wire:loading.attr="disabled">remove
                    </button>
                </div>
            </div>
        </div>
    @endforeach
    <div class="w-100 d-flex">
        <button class="btn btn-success ml-auto" type="button" wire:click="add({{$i}})"  wire:loading.attr="disabled">Ajouter une couleur</button>
    </div>
</div>
