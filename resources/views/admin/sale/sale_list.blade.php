@extends('admin.layout.master_layout')

@section('inner-content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Sales Outwards</h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">


    <div class="block block-rounded block-bordered">

        <div class="block-header block-header-default">
            <h3 class="block-title">Sales Product List</h3>
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
                            <th class="text-center">#</th>
                            <th>Date</th>
                            <th style="width: 20%;">Product</th>
                            <th style="width: 20%;">Seller</th>
                            <th>CGST</th>
                            <th>SGST</th>
                            <th>IGST</th>
                            <th>Qty</th>
                            <th style="width: 10%;">Price</th>
                            <th style="width: 15%;">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($sales as $key => $sale)

                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td align="left">
                                {{ $sale->sale_bill->bill_date }} <br>
                                <a href="{{ route('bill.view', [ 'bill_id' => $sale->bill_id, 'bill_type' => $sale->sale_bill->bill_type ]) }}">
                                <span style="color:red; font-size:14px;">{{ $sale->sale_bill->bill_number }}</span>
                                </a>
                            </td>
                            <td>
                                {{ ucfirst($sale->product_name) }} <br>
                                <span style="color:green; font-size:12px;">{{ $sale->hsn_code }}</span>
                            </td>
                            <td>
                                {{ ucfirst($sale->sale_bill->seller->name) }} <br>
                                <a href="{{ route('seller.view', [ 'id' => $sale->sale_bill->seller_id ]) }}">
                                    <span style="color:blue; font-size:12px;">{{ ucfirst($sale->sale_bill->seller->shop_name) }}</span>
                                </a>
                            </td>
                            <td>{{ number_format($sale->cgst, 1) }}%</td>
                            <td>{{ number_format($sale->sgst, 1) }}%</td>
                            <td>{{ number_format($sale->igst, 1) }}%</td>
                            <td align="right">{{ $sale->quantity }}</td>
                            <td align="right">{{ number_format($sale->selling_price, 2) }}</td>
                            <td align="right">{{ number_format($sale->total, 2) }}</td>
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

