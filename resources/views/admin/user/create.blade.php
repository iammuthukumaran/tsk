@extends('admin.layout.master_layout')

@section('inner-content')
                    <!-- Page Content -->
                    <div class="content">
                    <!-- Elements -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Create Buyer or Seller</h3>
                        </div>
                        <div class="block-content">
                        <form method="POST" action="{{ route('user.store') }}">
                                   {{ csrf_field() }}
                            
                                <h6>Shop Details</h6>
                                   <div class="row push">
                                <div class="col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="example-text-input">Shop Name <span class="text-danger">*</span></label>
                                        <input type="text" name="shop_name" class="form-control {{$errors->has('shop_name') ?  'alert alert-danger' : ''}}" value="{{  old('shop_name') }}" placeholder="Enter Shop Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> GST Type <span class="text-danger">*</span></label>
                                            <select class="form-control" name="gst_type" value="{{  old('gst_type') }}" required>
                                                <option value="">Select GST</option>
                                                <option value="our_state">Tamil Nadu</option>
                                                <option value="other_state">Other State</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                <div class="col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="example-text-input"> Address </label>
                                        <textarea class="form-control" name="address">{{  old('address') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> Bank Details</label>
                                            <textarea class="form-control" name="bank_details">{{  old('bank_details') }}</textarea>
                                        </div>
                                    </div>
                            </div>
                                    <h6>Agent Details</h6>

                                
                            <div class="row push">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> Agent Type <span class="text-danger">*</span></label>
                                            <select class="form-control" name="user_type" value="{{  old('user_type') }}" required>
                                                <option value="">Select Agent</option>
                                                <option value="buyer">Buyer</option>
                                                <option value="seller">Seller</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control {{$errors->has('user_name') ?  'alert alert-danger' : ''}}" value="{{  old('name') }}" placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" value="{{  old('email') }}" placeholder="Enter Email" required>
                                        </div>
                                    </div>                                  
                                   
                                   
                                    
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> Mobile <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" class="form-control" value="{{  old('phone') }}" placeholder="Enter Mobile" required>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> Alternate Mobile</label>
                                            <input type="text" name="alternate_phone" class="form-control" value="{{  old('alternate_phone') }}" placeholder="Enter Alternate Mobile">
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