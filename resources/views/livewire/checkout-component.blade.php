<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        @auth
                            <div class="toggle_info">
                                <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Hello</span> <a
                                        href="#" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                                        {{ Auth::user()->name }}!</a></span>
                            </div>
                        @else
                            <div class="toggle_info">
                                <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Already have an
                                        account?</span> <a href="#loginform" data-bs-toggle="collapse" class="collapsed"
                                        aria-expanded="false">Click here to login</a></span>
                            </div>
                            <div class="panel-collapse collapse login_form" id="loginform">
                                <div class="panel-body">
                                    <p class="mb-30 font-sm">If you have shopped with us before, please enter your details
                                        below. If you are a new customer, please proceed to the Billing &amp; Shipping
                                        section.</p>
                                    <form method="post" action="{{ Route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required="" name="email" placeholder="Your Email"
                                                :value="old('email')" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password" placeholder="Password"
                                                required autocomplete="current-password">
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="exampleCheckbox1" value="">
                                                    <label class="form-check-label" for="exampleCheckbox1"><span>Remember
                                                            me</span></label>
                                                </div>
                                            </div>
                                            <a class="text-muted" href="{{ Route('password.request') }}">Forgot
                                                password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up"
                                                name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                                <div class="mb-20">
                                    <h4>Your Orders</h4>
                                </div>
                                <div class="table-responsive order_table text-center">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}
                                        </div>
                                    @endif
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::content() as $item)
                                                <tr>
                                                    <td class="image product-thumbnail"><img
                                                            src="{{ asset('assets/imgs/products/') }}/{{ $item->model->image }}"
                                                            alt="#"></td>
                                                    <td>
                                                        <h5><a
                                                                href="{{ Route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                                        </h5> <span class="product-qty">x {{ $item->qty }}</span>
                                                    </td>
                                                    <td>${{ $item->subtotal }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th>SubTotal</th>
                                                <td class="product-subtotal" colspan="2">${{ Cart::subtotal() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td colspan="2"><em>Free Shipping</em></td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td colspan="2" class="product-subtotal"><span
                                                        class="font-xl text-brand fw-900">${{ Cart::total() }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                @auth
                                    <a href="{{ Route('pdf') }}" class="btn btn-fill-out btn-block mt-30">Export Order</a>
                                    <a href="#" wire:click.prevent='validateOrder()' class="btn btn-fill-out btn-block mt-30">Place Order</a>
                                @endauth
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>
