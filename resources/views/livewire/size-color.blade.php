<div>
    <div class="pro__dtl__size">
        <h2 class="title__5">Size</h2>
        <ul class="pro__choose__size">
            @foreach($product->sizes as $size)
                <li><a href="#" wire:click="chooseSize({{$size->id}})">{{$size->size}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="pro__dtl__color">
        <h2 class="title__5">Choose Colour</h2>
        <ul class="pro__choose__color">
            @foreach($colors as $color)
                @if($color->quantity > 0)
                    <li><i class="zmdi zmdi-circle"
                           style="color: #{{$color->color}}; cursor: pointer"
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
                <input type="hidden" name="color" wire:model="color">
                <div class="product-quantity">
                    <div class="cart-plus-minus">
                        <input class="cart-plus-minus-box" type="text" name="qty" value="02">
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
    <ul class="pro__dtl__btn">
        <li class="buy__now__btn"><a href="#" onclick="addToCart()">buy now</a></li>
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
