<div>
    <div class="pro__dtl__size">
        <h2 class="title__5">Taille</h2>
        <ul class="pro__choose__size">
            @foreach($product->sizes as $size)
                <li><a class="p-2  {{$size_id == $size->id ? 'isChecked' : ''}}" href="javascript:void(0)" wire:click="chooseSize({{$size->id}})"
                    >{{$size->size}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="pro__dtl__color">
        <h2 class="title__5">Couleur</h2>
        <ul class="pro__choose__color">
            @foreach($colors as $c)
                @if($c->quantity > 0)
                    <li>
                        <i class="fa fa-circle fa-2x {{$color == $c->id ? 'isChecked' : ''}}"
                           style="color: #{{$c->color}}; cursor: pointer; border: solid black 2px; border-radius: 50%; "
                           wire:click="chooseColor({{$c->id}})"></i>
                    </li>
                @endif
            @endforeach
        </ul>
        @error('color')
        <span class="text-danger small" >
                                        *{{ $message }}
                                    </span>
        @enderror
    </div>
    <div class="product-action-wrap">
{{--        <div class="prodict-statas"><span>Quantity :</span></div>--}}
        <div class="product-quantity">
            <form id='add-to-cart' method='POST' action="{{route('cart.store')}}" >
                @csrf
                <input type="hidden" name="size">
                <input type="hidden" name="color" wire:model.defer="color">
            </form>
        </div>
    </div>
    <ul class="pro__dtl__btn " >
        <li class="buy__now__btn">
            <a href="javascript:void(0)" onclick="addToCart()" wire:loading.remove>Ajouter a votre panier</a>
            <div wire:loading>
                <a href="javascript:void(0)"  wire:loading class="bg-secondary">Ajouter a votre panier</a>
            </div>

        </li>
    </ul>
</div>
@push('js')
    <script>
        function addToCart()
        {
            $('#add-to-cart').submit()
        }
    </script>
@endpush
