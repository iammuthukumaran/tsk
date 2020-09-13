@extends('admin.layout.master_layout')

@section('inner-content')
                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Buying Details History</h1>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">


            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title"><b>{{ ucfirst($buyer->shop_name) }}</b></h3>
                    <div class="block-options">
                        <i class="fa fa-user"> {{ ucfirst($buyer->name) }} </i> <br>
                        <i class="fa fa-phone"> {{ $buyer->phone }} </i> <br>
                        <i class="fa fa-envelope"> {{ $buyer->email }} </i>
                    </div>
                </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th  style="width: 15%;">Date</th>
                                        <th  style="width: 25%;">Product</th>
                                        <th  style="width: 20%;">HSN Code</th>
                                        <th  style="width: 10%;">Qty</th>
                                        <th  style="width: 15%;">Price</th>
                                        <th  style="width: 15%;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                        @foreach($buyer->buying_details as $key => $stock)

                          <tr>
                            <td class="text-center">{{$key+1}}</td>                            
                            <td align="center">{{ $stock->buy_date }}</td>
                            <td>
                                {{ $stock->product->product_name }}
                            </td>
                            <td>
                                <span style="color:green;">{{ $stock->product->hsn_code }}</span>
                            </td>
                            <td>{{ $stock->quantity }}</td>
                            <td align="right">{{ number_format($stock->buying_price,2) }}</td>
                            <td align="right">{{ number_format($stock->total,2) }}</td>
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
