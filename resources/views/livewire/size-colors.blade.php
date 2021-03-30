<div>
    @foreach($color_inputs as $color_key => $color_value)
        <div class="row">
            <div class="form-group col-4">
                <label class="form-label">Couleur*</label>
                <input type="color" class="form-control" placeholder="Couleur"
                       name="colors[{{$sizeId}}][]" wire:model.defer="color.{{ $color_value }}" required>
            </div>
            <div class="form-group col-4">
                <label class="form-label">Qte*</label>
                <input type="number" class="form-control" placeholder="000"
                       name="quantities[{{$sizeId}}][]" required wire:model.defer="quantity.{{ $color_value }}">
            </div>
            <div class="form-group col-4">
                <div class="d-flex align-items-end h-75">
                    <button class="btn btn-danger ml-auto" {{$color_key == 0 ? 'disabled' : ''}} type="button"
                            wire:click="remove({{$color_key}})" wire:loading.attr="disabled">X
                    </button>
                </div>
            </div>
        </div>
    @endforeach
    <div class="w-100 d-flex">
        <button class="btn btn-success ml-auto" type="button" wire:click="add_color({{$j}})"  wire:loading.attr="disabled">Ajouter une couleur</button>
    </div>

</div>
