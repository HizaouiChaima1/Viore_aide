<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Products
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 py-15">
                        <div class="card">
                            <div class="class-header mt-15 mb-15 ml-15 mr-15">
                                <div class="row flex align-items-center">
                                    <div class="col-md-6">
                                        All Products
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body ">
                                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file" class="form-control">
                                                <button class="btn btn-success">Import Product</button>
                                                <a class="btn btn-warning" href="{{ route('export') }}">Export Product</a>
                                                <a href="{{ Route('admin.product.add')}}" class="btn btn-success float-end">Add New Product</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card_body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <table class="table table-striped mb-15">
                                    <thead>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($products->currentPage()-1)*$products->perPage();
                                        @endphp
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td><img src="{{ asset('assets/imgs/products/')}}/{{$product->image}}" alt="{{$product->name}}" width="60"/></td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->stock_status}}</td>
                                                <td>{{$product->regular_price}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>{{$product->created_at}}</td>
                                                <td>
                                                    <a href="{{Route('admin.product.edit',['product_id'=>$product->id])}}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger" onclick='deleteConfirmation({{$product->id}})' style="margin-left:20px;">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

{{-- Delete confirmation --}}
<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('assets/imgs/confirmation.png')}}"  height="90px" width="90px">
                        <h4 class="pb-3 mt-10 mb-10">Are you sure, you want to delete this product?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle='modal' data-bs-target='#deleteConfirmation'>Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteProduct()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('product_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteProduct(params) {
            @this.call('deleteProduct');
            $('#deleteConfirmation').modal('hide');

        }
    </script>
@endpush

