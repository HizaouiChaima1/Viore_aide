<div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="{{Route('shop.cart')}}">
            <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg')}}">
            @if (Cart::count() > 0)
                <span class="pro-count blue">{{Cart::count()}}</span>
            @endif
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                @foreach (Cart::content() as $item )
                    <li>
                        <div class="shopping-cart-img">
                            <a href="{{Route('product.details',['slug'=>$item->model->slug])}}"><img alt="{{$item->model->name}}" src="{{ asset('assets/imgs/shop/product-')}}{{$item->model->id}}-1.jpg"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href=""{{Route('product.details',['slug'=>$item->model->slug])}}"">{{ substr($item->model->name,0,20)}}...</a></h4>
                            <h4><span>{{$item->qty}} × </span>${{$item->model->regular_price}}</h4>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>${{Cart::total()}}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{Route('shop.cart')}}" class="outline">View cart</a>
                    @if (Cart::count() > 0)
                        <a href="{{Route('shop.checkout')}}">Checkout</a>
                    @else
                        <a href="{{Route('shop')}}">update cart</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
