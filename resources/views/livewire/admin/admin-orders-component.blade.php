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
                    <span></span> All Orders
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
                                        All Orders
                                    </div>
                                </div>
                            </div>
                            <div class="card_body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Date</th>
                                            <th>Subtotal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order )
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>${{$order->total}}</td>
                                                @if ($order->status === 'Waiting')
                                                    <td>
                                                        <a href="#" class="text-info" onclick='acceptConfirmation({{$order->id}})'>Accept</a>
                                                        <a href="#" class="text-danger" onclick='refuseConfirmation({{$order->id}})' style="margin-left:20px;">Refuse</a>
                                                    </td>
                                                @else
                                                    <td class="text-black-50">Order {{$order->status}}</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        <tr><td colspan="5"></td></tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="4" class="product-subtotal text-center"><span class="font-xl text-brand fw-900">${{$total}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{$orders->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

{{-- Accept confirmation --}}
<div class="modal" id="acceptConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Are you sure ?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle='modal' data-bs-target='#acceptConfirmation'>No</button>
                        <button type="button" class="btn btn-danger" onclick="acceptOrder()">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function acceptConfirmation(id){
            @this.set('order_id',id);
            $('#acceptConfirmation').modal('show');
        }

        function acceptOrder(params) {
            @this.call('acceptOrder');
            $('#acceptConfirmation').modal('hide');

        }
    </script>
@endpush


{{-- Refuse confirmation --}}
<div class="modal" id="refuseConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('assets/imgs/confirmation.png')}}"  height="90px" width="90px">
                        <h4 class="pb-3 mt-10 ">Are you sure ?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle='modal' data-bs-target='#refuseConfirmation'>No</button>
                        <button type="button" class="btn btn-danger" onclick="refuseOrder()">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function refuseConfirmation(id){
            @this.set('order_id',id);
            $('#refuseConfirmation').modal('show');
        }

        function refuseOrder(params) {
            @this.call('refuseOrder');
            $('#refuseConfirmation').modal('hide');

        }
    </script>
@endpush

