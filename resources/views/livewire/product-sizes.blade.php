<div>
    @foreach($inputs as $key => $value)
        <div class="row border border-1 p-2">
            <div class="form-group w-100">
                <label class="form-label"></label>
                <button class="btn btn-danger btn-sm float-right" {{$key == 0 ? 'disabled' : ''}} type="button"
                        wire:click="remove({{$key}})" wire:loading.attr="disabled">X
                </button>
                <label class="form-label">Taille*</label>
                <input type="text" class="form-control" placeholder="Maitre 0 si la taille est standard"
                       name="sizes[]" wire:model.defer="size.{{ $value }}" required>
            </div>
            <div class="form-group col-12">
                @if(!empty($product->sizes[$key]))
{{--                    :size="$product->sizes[$key]"--}}
                    <livewire:size-colors :sizeId="$key" :size="$product->sizes[$key]" :key="$key"/>
                @else
                    <livewire:size-colors :sizeId="$key"  :key="$key"/>
                @endif
            </div>

        </div>
        <hr class="w-100">
    @endforeach
    <div class="w-100 d-flex">
        <button class="btn btn-success ml-auto mt-2" type="button" wire:click="add({{$i}})"
                wire:loading.attr="disabled">Ajouter une Taille
        </button>
    </div>

</div>
