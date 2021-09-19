<div>
    <div class="pro__dtl__size">
        <h2 class="title__5">Taille</h2>
        <ul class="pro__choose__size">
            @foreach($product->sizes as $size)
                <li><a  style="padding: 8px;background-color: #eeeeee;border-radius: 10px;min-width: 50px" class=" {{$size_id == $size->id ? 'isChecked' : ''}}" href="javascript:void(0)" wire:click="chooseSize({{$size->id}})"
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
                        <span class="fa fa-square fa-3x {{$color == $c->id ? 'isChecked' : ''}}"
                           style="color: #{{$c->color}}; cursor: pointer; border-width:  2px!important; border-radius: 10px;padding: 2px!important;
                               box-shadow: 0 1px 1px rgba(0,0,0,0.12),
                               0 2px 2px rgba(0,0,0,0.12),
                               0 4px 4px rgba(0,0,0,0.12),
                               0 8px 8px rgba(0,0,0,0.12),
                               0 16px 16px rgba(0,0,0,0.12);"
                           wire:click="chooseColor({{$c->id}})"></span>
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
