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
                    <table id="sales-report" class="table table-bordered">
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
                                        <th style="width: 25%;">Total</th>
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
                                <tfoot>
                                    <tr>
                                        <th colspan="8" style="text-align:right">Total:</th>
                                        <th colspan="1"></th>
                                    </tr>
                                </tfoot>
                            </table>
                    </div>
                                </div>
             </div>


                </div>
                <!-- END Page Content -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
     $(document).ready(function() {
       
       var table = $('#sales-report').DataTable( {
           "footerCallback": function ( row, data, start, end, display ) {
               var api = this.api(), data;
   
               // Remove the formatting to get integer data for summation
               var intVal = function ( i ) {
                   return typeof i === 'string' ?
                       i.replace(/[\Rs ,]/g, '')*1 :
                       typeof i === 'number' ?
                           i : 0;
               };
               // Total over all pages
               total = api
                   .column( 8 )
                   .data()
                   .reduce( function (a, b) {
                       return intVal(a) + intVal(b);
                   }, 0 );
               console.log('total', total);
   
               // Total over this page
               pageTotal = api
                   .column( 8, { page: 'current'} )
                   .data()
                   .reduce( function (a, b) {
                       return intVal(a) + intVal(b);
                   }, 0 );
               console.log('pageTotal', pageTotal);
               // Update footer
               $( api.column( 8 ).footer() ).html(
                   'Rs.'+pageTotal +' of ( Rs.'+ total +' )'
               );
           },
           orderCellsTop: true,
           fixedHeader: true
       } );
   } );
</script>

@endsection
