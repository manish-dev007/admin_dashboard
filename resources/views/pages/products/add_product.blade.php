@extends('layout.app')

@section('title', 'Home')

@section('sidebar')
@parent


@endsection

@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('Products') }}">Products</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-box"></i>
                                Add New Product
                            </div>
                            <div class="card-body">
                                
                                    <form action="{{url('post-register')}}" method="POST" id="regForm">
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Full Name</label>
                                                <input class="form-control py-4" id="inputFirstName" type="text" name="name" placeholder="Enter Full Name" />
                                                 @if ($errors->has('name'))
                                                  <span class="error">{{ $errors->first('name') }}</span>
                                                  @endif  
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email address" />
                                                @if ($errors->has('email'))
                                                  <span class="error">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                                @if ($errors->has('password'))
                                                  <span class="error">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </main>
                @section('footer')
                @endsection
            </div>

            
@endsection

