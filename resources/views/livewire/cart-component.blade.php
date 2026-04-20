<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if (Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>Success | {{Session::get('success_message')}}</strong>
                            </div>
                            @endif
                            <table class="table shopping-summery text-center clean">

                                <tbody>
                                    @if (Cart::count() > 0)
                                        @foreach (Cart::content() as $item )
                                            <tr>
                                                <td class="image product-thumbnail"><img src="{{ asset('assets/imgs/products/')}}/{{$item->model->image}}" alt="#"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a href="{{Route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a></h5>
                                                </td>
                                                <td class="price" data-title="Price"><span>${{$item->model->regular_price}}</span></td>
                                                <td class="text-center" data-title="Stock">
                                                    <div class="detail-qty border radius  m-auto">
                                                        <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-down"></i></a>
                                                        <span class="qty-val">{{$item->qty}}</span>
                                                        <a href="#" class="qty-up" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-up"></i></a>
                                                    </div>
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <span>${{$item->subtotal}}</span>
                                                </td>
                                                <td class="action" data-title="Remove"><a href="#" class="text-muted" wire:click.prevents="destroy('{{$item->rowId}}')"><i class="fi-rs-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted" wire:click.prevent="clearAll()"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @else
                                <p>No item in cart</p>
                            @endif
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn" href="{{Route('shop')}}"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-12 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{Cart::subtotal()}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Tax</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{Cart::tax()}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Shipping</td>
                                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{Cart::total()}}</span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @if (Cart::count() > 0)
                                        <a href="{{Route('shop.checkout')}}" class="btn" > <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                                    @else
                                        <a class="btn" href="{{Route('shop')}}"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
