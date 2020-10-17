@extends('layout.app')

@section('title', 'All Products')

@section('sidebar')
@parent


@endsection

@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Products List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Product Image</th>
                                                <th>Seller Name</th>
                                                <th>Category Name</th>
                                                <th>Price</th>
                                                <th>In Stock ?</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                        
                                        @foreach ($products as $data)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $data->pname }}</td>
                                                <td><img src="{{ asset('storage/app/'.$data->pimg ) }}" style="max-width:50%;" /></td>
                                                <td>{{ $data->sname }}</td>
                                                <td>{{ $data->cn }}</td>
                                                <td>{{ $data->pprice }}</td>
                                                <td>@if ($data->stock == '1') <span class="badge badge-success">Available</span> @else <span class="badge badge-danger">Not Available</span> @endif</td>
                                                <td><?php echo ($data->status == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Not Active</span>'; ?></td>
                                                <td>
                                                    <a class="primary" href="{{url('Editproduct')}}/{{ $data->id }}" data-original-title="" title="">
                                                    <i data-feather="edit"></i>
                                                        </a>
                                                        
                                                    <a class="danger" data-original-title="" href="{{url('DeleteProduct')}}/{{ $data->id }}" title="">
                                                    <i data-feather="trash"></i>
                                                        </a>                                                        
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
@endsection

