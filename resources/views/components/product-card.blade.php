<div class="col-md-2 single__pro col-lg-2 cat--1 col-sm-4 col-xs-6 ">
    <div class="product foo ">
        <div class="product__inner">
            <div class="pro__thumb ui-widget-shadow" style="background-image: url({{asset($product->image_url)}});
                                background-size: cover;background-position: center; height: 200px;
                                border-radius: 10px;box-shadow:  #2b2b2b">
            </div>
            <div class="product__hover__info">
                <ul class="product__action">
                    <li><a  title="Quick View"
{{--                            data-toggle="modal" data-target="#productModal"--}}
                           class="quick-view modal-view detail-link" href="{{route('product-details', $product->id)}}"><span
                                class="ti-eye"></span></a></li>
                    <li><a title="Add TO Cart" href="cart.html"><span
                                class="ti-shopping-cart"></span></a></li>

                </ul>
            </div>
        </div>
        <div class="product__details">
            <h2><a href="{{route('product-details', $product->id)}}">{{$product->name}}</a></h2>
            <ul class="product__price">
                <li class="new__price">{{$product->price}} DA</li>
            </ul>
        </div>
    </div>
</div>
