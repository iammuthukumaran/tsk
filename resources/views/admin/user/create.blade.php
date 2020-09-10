@extends('admin.layout.master_layout')

@section('inner-content')
                    <!-- Page Content -->
                    <div class="content">
                    <!-- Elements -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">User Details</h3>
                        </div>
                        <div class="block-content">
                        <form method="POST" action="{{ route('user.store') }}">
                                   {{ csrf_field() }}
                                <div class="row push">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> User Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control {{$errors->has('user_name') ?  'alert alert-danger' : ''}}" value="{{  old('name') }}" placeholder="Enter User Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" value="{{  old('email') }}" placeholder="Enter Your Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row push">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" value="{{  old('password') }}" placeholder="Enter your Password" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="example-text-input"> User Type <span class="text-danger">*</span></label>
                                            <select class="form-control" name="user_type" value="{{  old('user_type') }}" required>
                                                <option value="">Select Agent</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Buyer</option>
                                                <option value="3">Seller</option>
                                            </select>
                                            
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