<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true"><i class="fi-rs-user mr-10"></i>Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="products-tab" data-bs-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" action="{{ Route('logout')}}">
                                            @csrf
                                            <a class="nav-link" href="{{Route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                        </li>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello {{Auth::user()->name}}! </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>From your account dashboard. you can easily manage <a href="{{route('admin.users')}}">the users</a>, view and update <a href="{{route('admin.products')}}">the products</a> and edit the <a href="{{route('admin.orders')}}">orders</a> status.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Users </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Manage the <a href="{{route('admin.users')}}">users</a>.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Products </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Manage the <a href="{{route('admin.products')}}">products</a>.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Orders </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Manage the <a href="{{route('admin.orders')}}">orders</a>.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Users </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Manage the <a href="{{route('admin.users')}}">users</a>.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
