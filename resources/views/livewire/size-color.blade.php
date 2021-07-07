<div>
    <div class="pro__dtl__size">
        <h2 class="title__5">Size</h2>
        <ul class="pro__choose__size">
            @foreach($product->sizes as $size)
                <li><a href="javascript:void(0)" wire:click="chooseSize({{$size->id}})"
                    style="{{$size_id == $size->id ? 'color:#f19199' : ''}}">{{$size->size}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="pro__dtl__color">
        <h2 class="title__5">Choose Colour</h2>
        <ul class="pro__choose__color">
            @foreach($colors as $color)
                @if($color->quantity > 0)
                    <li><i class="zmdi zmdi-circle "
                           style="color: #{{$color->color}}; cursor: pointer; border: solid black 2px; border-radius: 50%; "
                           wire:click="chooseColor({{$color->id}})"></i></li>
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
        <div class="prodict-statas"><span>Quantity :</span></div>
        <div class="product-quantity">
            <form id='add-to-cart' method='POST' action="{{route('cart.store')}}" >
                @csrf
                <input type="hidden" name="size">
                <input type="hidden" name="color" wire:model.defer="color">
                <div class="product-quantity">
                    <div class="cart-plus-minus">
                        <input class="cart-plus-minus-box" type="text" name="qty" value="1">
                    </div>
                    @error('qty')
                    <span class="text-danger small" >
                                        *{{ $message }}
                                    </span>
                    @enderror
                </div>
            </form>
        </div>
    </div>
    <ul class="pro__dtl__btn " >
        <li class="buy__now__btn">
            <a href="javascript:void(0)" onclick="addToCart()" wire:loading.remove>buy now</a>
            <div wire:loading>
                <a href="javascript:void(0)"  wire:loading class="bg-secondary">buy now</a>
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
