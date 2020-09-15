@extends('admin.layout.master_layout')

@section('inner-content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Buyers & Sellers</h1>
      <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">

        <a href="{{route('user.create')}}" class="btn btn-primary btn-sm">
          <i class="fa fa-fw fa-plus mr-1"></i> Add Agent
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
      <h3 class="block-title">All Agents</h3>
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
              <th>Agent Details</th>
              <th>Contact Details</th>
              <th>Bank & GST Details</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>

            @foreach($datas as $key => $data)

            <tr>
              <td class="text-center">{{$key+1}}</td>
              <td width="30%">
                {{ ucfirst($data->name) }} <span class="badge pull-right @if($data->user_type == 'buyer') badge-info @else badge-success @endif">{{ $data->user_type }}</span><br>
                @if($data->user_type == 'buyer')
                <b style="color: blue;">{{ ucfirst($data->shop_name) }}</b> <br>
                @else
                <b style="color: green;">{{ ucfirst($data->shop_name) }}</b> <br>
                @endif
                <i class="fa fa-phone" style="font-size:13px;"> {{ ucfirst($data->phone) }}</i>
              </td>
              <td width="30%">
                @if($data->address != '')
                <i class="fa fa-home" style="font-size:13px;"></i> {{ ucfirst($data->address) }} <br>
                @endif
                <i class="fa fa-envelope" style="font-size:13px;"> {{$data->email}} </i> <br>
                @if($data->alternate_phone != '')
                <i class="fa fa-phone" style="font-size:13px;"> {{ $data->alternate_phone }} (Alternate)</i>
                @endif
              </td>
              <td width="30%">
                {{ $data->bank_details }}
                <span class="badge pull-right">@if($data->gst_type == 'our_state') CGST - SGST @else IGST @endif</span>
              </td>

              <td>
                <div class="dropdown">
                  <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" id="dropdown-default-outline-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdown-default-outline-info">
                    @if($data->user_type == 'buyer')
                    <a class="dropdown-item" href="{{ route('buyer.view', $data->id) }}"> <i class="fa fa-fw fa-eye"></i> Purchase History</a>
                    @else
                    <a class="dropdown-item" href="{{ route('seller.view', $data->id) }}"> <i class="fa fa-fw fa-eye"></i> Sale History</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('user.edit', $data->id) }}">
                      <i class="fa fa-fw fa-edit"></i> Edit</a>
                    <!-- <a class="dropdown-item" onclick="return confirm('Are you sure?')" href="{{ route('user.destroy', $data->id) }}">
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