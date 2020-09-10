@extends('admin.layout.master_layout')

@section('inner-content')
                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Users</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                              
                                  <a href="{{route('user.create')}}" class="btn btn-primary btn-sm">
                                                  <i class="fa fa-fw fa-plus mr-1"></i> Add New
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
                                    <h3 class="block-title">All Products</h3>
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
                                        <th  style="width: 33%;">User Name</th>
                                        <th  style="width: 33%;">Email </th>
                                        <th  style="width: 33%;">User Type</th>
                                    </tr>
                                </thead>
                                <tbody>

                        @foreach($datas as $key => $data)

                          <tr>
                          <td class="text-center">{{$key+1}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->user_type}}</td>
                         
                          <td>
                          <div class="dropdown">
                          <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" id="dropdown-default-outline-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdown-default-outline-info">
                              <a class="dropdown-item" href="{{ route('user.edit', $data->id) }}">
                              <i class="fa fa-fw fa-edit"></i> Edit</a>
                              <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ route('user.destroy', $data->id) }}">
                              <i class="fa fa-fw fa-trash"></i> Delete</a>
                            
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



