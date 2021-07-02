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
                    <li><i class="zmdi zmdi-circle" style="color: #{{$color->color}};"></i></li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="product-action-wrap">
        <div class="prodict-statas"><span>Quantity :</span></div>
        <div class="product-quantity">
            <form id='myform' method='POST' action='#'>
                <div class="product-quantity">
                    <div class="cart-plus-minus">
                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
