@extends('admin.layout.master_layout')

@section('inner-content')
                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Sale Details History</h1>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><b>{{ ucfirst($seller->shop_name) }} </b></h3>
                    <div class="block-options">
                        <i class="fa fa-user"> {{ ucfirst($seller->name) }} </i> <br>
                        <i class="fa fa-phone"> {{ $seller->email }}  </i> <br>
                        <i class="fa fa-envelope"> {{ $seller->phone }}  </i>
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
                                    <th>CGST</th>
                                    <th>SGST</th>
                                    <th>IGST</th>
                                    <th>Qty</th>
                                    <th style="width: 10%;">Price</th>
                                    <th style="width: 15%;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($seller->sale_details as $key => $bill)
                                @foreach($bill->sales as $i => $sale)
                                <tr>
                                    <td class="text-center">{{ $key + $i + 1 }}</td>
                                    <td align="left">
                                        {{ $bill->bill_date }} <br>
                                        <span style="color:red; font-size:14px;">{{ $bill->bill_number }}</span>
                                    </td>
                                    <td>
                                        {{ ucfirst($sale->product_name) }} <br>
                                        <span style="color:green; font-size:12px;">{{ $sale->hsn_code }}</span>
                                    </td>
                                    <td>{{ number_format($sale->cgst,1) }}%</td>
                                    <td>{{ number_format($sale->sgst,1) }}%</td>
                                    <td>{{ number_format($sale->igst,1) }}%</td>
                                    <td align="right">{{ $sale->quantity }}</td>
                                    <td align="right">{{ number_format($sale->selling_price,2) }}</td>
                                    <td align="right">{{ number_format($sale->total,2) }}</td>
                                </tr>

                                @endforeach
                                @endforeach

                                </tbody>
                            </table>
                    </div>
                                </div>
             </div>


                </div>
                <!-- END Page Content -->


@endsection
