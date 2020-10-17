@extends('layout.app')

@section('title', 'Update Product')

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
                            <li class="breadcrumb-item"><a href="{{ url('Products') }}">Products</a></li>
                            <li class="breadcrumb-item active">Update Product</li>
                        </ol>

                        @foreach ($product_data as $productData)
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-box"></i>
                                Update Product
                            </div>
                            <div class="card-body">
                                
                                    <form action="{{ url('update-product') }}/{{ $productData->id }}" method="POST" id="regForm" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
									<label class="small mb-1" for="cname">Product Name</label>
									<input type="text" id="vname" class="form-control" value="{{ $productData->pname }}"  placeholder="Enter Product Name" name="pname" >
								</div>
								
								<div class="form-group">
									<label class="small mb-1" for="cname">Product Image</label>
									<input type="file" id="pimg" class="form-control"  placeholder="Enter Product Image" name="pimg" >
                                    @if ($productData->pimg != '')
                                        <img src="{{ asset('storage/app/'.$productData->pimg ) }}" style="width:10%;">
                                    @endif
								</div>
								
								<div class="form-group">
									<label class="small mb-1" for="cname">Product Related Image</label>
									<input type="file" id="pimg1" class="form-control"  placeholder="Enter Product Related Image" name="prel[]" multiple >
								    <p class="err_img">*Only Upload 3 Images</p>
                                    @if ($productData->prel != '')
                                        @php
                                            $prel_img = explode(",",$productData->prel);
                                        @endphp

                                  @foreach ($prel_img as $data_prel)
                                        <img src="{{ asset('storage/app/'.$data_prel ) }}" style="width:10%;">
                                        @endforeach		
                                    @endif
								</div>
								
                                <div class="form-group">
									<label class="small mb-1" for="gurl">Seller Name / Shop Name</label>
									<input type="text" id="gurl" class="form-control"  value="{{ $productData->sname }}" placeholder="Enter Seller Name" name="sname" >
									
								</div>
								
								<div class="form-group">
											<label class="small mb-1" for="projectinput6">Select Category</label>
											<select id="cat_change" name="catname" class="form-control" onchange="categ_func()" >
												<option value="" selected="" disabled="">Select Category</option>
												@foreach ($product_categ as $data)
													<option value="{{ $data->id }}" {{ ($productData->cid == $data->id) ? 'selected' : '' }}>{{ $data->catname }}</option>
												@endforeach												
											</select>
										</div>
										
										<div class="form-group">
											<label class="small mb-1" for="projectinput6">Select SubCategory</label>
											<select id="sub_list" name="subcatname" class="form-control" >
												
											</select>
										</div>
										

								<div class="form-group">
											<label class="small mb-1" for="projectinput6">In Stock?</label>
											<select id="projectinput6" name="ostock" class="form-control">
												
												<option value="1" {{ ($productData->sname == 1) ? 'selected' : '' }}>Yes</option>
												<option value="0" {{ ($productData->sname == 0) ? 'selected' : '' }}>No</option>
											</select>
										</div>

										<div class="form-group">
											<label class="small mb-1" for="ptax">Product Tax (in %)</label>
											<input type="text" id="ptax" class="form-control" value="{{ $productData->ptax }}"  placeholder="Enter Product Tax" name="ptax" >
											
										</div>
										
										<div class="form-group">
											<label class="small mb-1" for="projectinput6">Product Publish Or Unpublish?</label>
											<select id="projectinput6" name="ppuborun" class="form-control">
												
												<option value="0" {{ ($productData->status == 0) ? 'selected' : '' }}>Unpublish</option>
												<option value="1" {{ ($productData->status == 1) ? 'selected' : '' }}>Publish</option>
											</select>
										</div>
										
										<div class="form-group">
											<label class="small mb-1" for="projectinput6">Make Product Popular?</label>
											<select id="projectinput6" name="popular" class="form-control">
												
												<option value="1" {{ ($productData->popular == 1) ? 'selected' : '' }}>Yes</option>
												<option value="0" {{ ($productData->popular == 0) ? 'selected' : '' }}>No</option>
											</select>
										</div>
										
								<div class="form-group">
									<label class="small mb-1" for="gurl">Product Small Description</label>
									<textarea class="form-control" name="psdesc" placeholder="Enter Product Small Description" >{{ $productData->psdesc }}</textarea>
									
								</div>
									
								
								<div class="form-group">
									<label class="small mb-1" for="gurl">Product (Gms,kg,ltr,ml,pcs)</label>
									<input type="text" id="ptype" class="form-control"  name="pgms" value="{{ $productData->pgms }}"  placeholder="1 gms,250 gms" data-role="tagsinput"  >
									
								</div>
								
								<div class="form-group">
									<label class="small mb-1" for="gurl">Product Price</label>
									<input type="text" id="pprice" class="form-control" value="{{ $productData->pprice }}" placeholder="1,10" name="pprice" data-role="tagsinput" >
									
								</div>
								
								<div class="form-group">
									<label class="small mb-1" for="gurl">Product discount (Only Digit)</label>
									<input type="text" id="gurl" class="form-control" value="{{ $productData->discount }}" name="discount_percentage" placeholder="Enter discount in percentage ex. 5" >
									
								</div>
                                            <div class="form-group mt-4 mb-0 col-md-3">
                                                <button class="btn btn-primary btn-block" type="submit">Update Product</button>
                                            </div>
                                        </form>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </main>
                @section('footer')
                @endsection
            </div>

            
@endsection