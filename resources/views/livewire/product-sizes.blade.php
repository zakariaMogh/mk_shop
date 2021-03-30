<div>
    @foreach($inputs as $key => $value)
        <div class="row">
            <div class="form-group col-1">
                    <label class="form-label"></label>
                    <button class="btn btn-danger " {{$key == 0 ? 'disabled' : ''}} type="button"
                            wire:click="remove({{$key}})" wire:loading.attr="disabled">remove
                    </button>
            </div>
            <div class="form-group col-4 ml-3">
                <label class="form-label">Taille*</label>
                <input type="text" class="form-control" placeholder="Maitre 0 si la taille est standard"
                       name="size[]" wire:model.defer="size.{{ $value }}" required>
            </div>
            <div class="form-group col-7 ml-3">
                <livewire:product-sizes/>
            </div>
        </div>
    @endforeach
    <div class="w-100 d-flex">
        <button class="btn btn-success ml-auto" type="button" wire:click="add({{$i}})"  wire:loading.attr="disabled">Ajouter une taille</button>
    </div>
</div>
