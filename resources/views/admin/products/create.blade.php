@extends('admin.layout.master_layout')

@section('inner-content')
                    <!-- Page Content -->
                    <div class="content">
                    <!-- Elements -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Create Product</h3>
                        </div>
                        <div class="block-content">
                        <form method="POST" action="{{ route('products.store')}}">
                                   {{ csrf_field() }}
                                <div class="row push">
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="example-text-input"> Product Name <span class="text-danger">*</span></label>
                                            <input type="text" name="product_name" class="form-control {{$errors->has('product_name') ?  'alert alert-danger' : ''}}" value="{{  old('product_name') }}" placeholder="Enter Product Name" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="example-text-input"> HSN code <span class="text-danger">*</span></label>
                                            <input type="text" name="hsn_code" class="form-control" value="{{  old('hsn_code') }}" placeholder="Enter HSN code" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="example-text-input"> Selling Price <span class="text-danger">*</span></label>
                                            <input type="text" name="selling_amount" class="form-control" value="{{  old('selling_amount') }}" placeholder="Enter Selling Price" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="example-text-input"> CGST% <span class="text-danger">*</span></label>
                                            <input type="text" name="cgst" class="form-control" value="{{  old('cgst') }}" placeholder="Enter CGST" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="example-text-input"> SGST% <span class="text-danger">*</span></label>
                                            <input type="text" name="sgst" class="form-control" value="{{  old('sgst') }}" placeholder="Enter SGST" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="example-text-input"> IGST% <span class="text-danger">*</span></label>
                                            <input type="text" name="igst" class="form-control" value="{{  old('igst') }}" placeholder="Enter IGST" required>
                                        </div>
                                    </div>
                                    
                                    
                                </div>                                
                                <div class="row push">
                                    <div class="col-lg-12 col-xl-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button  class="btn btn-info">Back</button>
                                    </div>
                                </div>                                
                            </form>
                        </div>
                    </div>
                    <!-- END Elements -->
                </div>
                <!-- END Page Content -->
 @if ($errors->any())
  <div class="alert alert-danger">
    
    <ul>
       @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    
  </div>
  @endif


@endsection