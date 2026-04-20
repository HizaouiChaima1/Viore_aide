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
                    <span></span> All Users
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
                                        All Users
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($users->currentPage()-1)*$users->perPage();
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->created_at}}</td>
                                                <td>
                                                    <a href="#" class="text-danger" onclick='deleteConfirmation({{$user->id}})' style="margin-left:20px;">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$users->links()}}
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
                        <h4 class="pb-3 mt-10 mb-10">Are you sure, to delete this user ?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle='modal' data-bs-target='#deleteConfirmation'>No</button>
                        <button type="button" class="btn btn-danger" onclick="deleteUser()">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('user_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteUser(params) {
            @this.call('deleteUser');
            $('#deleteConfirmation').modal('hide');

        }
    </script>
@endpush

