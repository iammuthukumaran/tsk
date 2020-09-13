@extends('admin.layout.master_layout')

@section('inner-content')
                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Products</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                              
                                  <a href="{{route('products.create')}}" class="btn btn-primary btn-sm">
                                                  <i class="fa fa-fw fa-plus mr-1"></i> Add Product
                                  </a>
                             
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


                <div class="block block-rounded block-bordered">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Product Lists</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 20px;">#</th>
                                        <th  style="width: 20%;">Product</th>
                                        <th  style="width: 20%;">HSN Code</th>
                                        <th  style="width: 5%;">Stock</th>
                                        <th  style="width: 15%;">Price</th>
                                        <th  style="width: 10%;">CGST</th>
                                        <th  style="width: 10%;">SGST</th>
                                        <th  style="width: 10%;">IGST</th>
                                        <th  style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                        @foreach($datas as $key => $data)

                          <tr>
                          <td class="text-center">{{$key+1}}</td>
                          <td>{{$data->product_name}}</td>
                          <td>{{$data->hsn_code}}</td>
                          <td align="center">{{$data->stock}}</td>
                          <td align="right">{{ number_format($data->selling_amount,2) }}</td>
                          <td align="right">{{ number_format($data->cgst,1) }}%</td>
                          <td align="right">{{ number_format($data->sgst,1) }}%</td>
                          <td align="right">{{ number_format($data->igst,1) }}%</td>
                          <td>
                          <div class="dropdown">
                          <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" id="dropdown-default-outline-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdown-default-outline-info">
                              <a class="dropdown-item" href="{{ route('products.edit', $data->id) }}">
                              <i class="fa fa-fw fa-edit"></i> Edit</a>
                              <!-- <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ route('products.destroy', $data->id) }}">
                              <i class="fa fa-fw fa-trash"></i> Delete</a> -->
                            
                          </div>
                           </div>
                          </td>
                          </tr>

                        @endforeach

                                </tbody>
                            </table>
                    </div>
                                </div>
             </div>


                </div>
                <!-- END Page Content -->


@endsection



