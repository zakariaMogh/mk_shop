<div class="cart-main-area ptb--70 bg__white">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('front.layouts.partials.messages')
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-name">Color</th>
                                <th class="product-name">Size</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cart as $color)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{$color->size->product->image_url}}" alt="{{$color->size->product->name}}" height="100" width="100"/>
                                    </td>
                                    <td class="product-name"><a href="{{route('product-details',$color->size->product->id)}}">{{$color->size->product->name}}</a></td>
                                    <td class="product-quantity" >
                                        <div   style="background-color: #{{$color->color}};margin: auto;
                                            height: 60px;
                                            width: 60px;
                                            border-radius: 20px;
                                            border: solid black 1px">
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">
                                            <span class="xxl__size">{{$color->size->size}}</span>
                                        </a>
                                    </td>
                                    <td class="product-price"><span class="amount">{{$color->size->product->current_price}}DA</span></td>
                                    <td class="product-quantity"><input type="number" value="{{$color->qty ?? 1}}" min="1" max="{{$color->quantity}}" wire:model.debounce.500ms="quantities.{{$color->id}}"/></td>
                                    <td class="product-subtotal">{{$color->size->product->current_price * ($color->qty ?? 1)}}DA</td>
                                    <td class="product-remove"><a href="javascript:void(0)" wire:click="remove({{$color->id}})" wire:loading.class="d-none">X</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        Empty cart
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="buttons-cart">
                                <a href="{{route('shop')}}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart_totals">
                                <table>
                                    <tbody>
                                    <tr class="order-total">
                                        <th class="h1">Total</th>
                                        <td>
                                            <strong><span class="amount">{{$total}}DA</span></strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{route('checkout')}}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
