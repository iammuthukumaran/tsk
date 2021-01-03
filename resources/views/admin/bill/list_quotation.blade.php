@extends('admin.layout.master_layout')

@section('inner-content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">List of Quotations</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">

                <a href="{{ route('bill.create', [ 'bill_type' => 'quotation' ]) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus mr-1"></i> New Quotation
                </a>

            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

    <div class="block block-rounded block-bordered">
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 20px;">#</th>
                            <th>Bill Type</th>
                            <th>Billed</th>
                            <th>Date</th>
                            <th>Seller Details</th>
                            <th>GST Total</th>
                            <th>Total</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($bills as $i => $bill)
                        <tr>
                            <td class="text-center">{{ $i+1 }}</td>
                            <td class="text-left">
                                {{ $bill->bill_number }}
                                @if($bill->bill_type == 'sale')
                                <span class="badge pull-right  badge-success ">{{ $bill->bill_type }}</span>
                                @elseif($bill->bill_type == 'quotation')
                                <span class="badge pull-right  badge-info ">{{ $bill->bill_type }}</span>
                                @else
                                <span class="badge pull-right  badge-warning ">Pending</span>
                                @endif
                            </td>
                            <td class="text-center">{{ ucfirst($bill->is_billed) }}</td>
                            <td class="text-center">{{ $bill->bill_date }}</td>
                            <td width="30%">
                                @if($bill->seller_id)
                                {{ ucfirst($bill->seller->name) }} <br>
                                <b style="color: green;">{{ ucfirst($bill->seller->shop_name) }}</b> 
                                @endif
                            </td>
                            <td class="text-right">0.00</td>
                            <td class="text-right">{{ number_format($bill->total, 2) }}</td>

                            <td class="text-center">
                                @if($bill->is_billed == 'yes')
                                <div class="dropdown">
                                    <a href="{{ route('bill.view', [ 'bill_id' => $bill->id , 'bill_type' => $bill->bill_type ]) }}" class="btn btn-sm btn-outline-success">
                                        @if($bill->bill_type == 'sale')
                                            Bill
                                        @else
                                            Quotation
                                        @endif
                                    </a>
                                </div>
                                @else
                                <div class="dropdown">
                                    <a href="{{ route('bill.make', [ 'bill_id' => $bill->id , 'bill_type' => $bill->bill_type ]) }}" class="btn btn-sm btn-outline-info"> view</a>
                                </div>
                                @endif
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