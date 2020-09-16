@extends('admin.layout.master_layout')

@section('inner-content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>

    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="row">
                <div class="col-md-12 bill-canvas" id="bill-canvas">
                        <div class="table-responsive" style="border: 1px solid grey; padding:20px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="7" align="Center">
                                            <h4>TSK Traders Pvt Ltd</h4>
                                            <h5>No1, Melamasi Street, Madurai - 624401</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Customer Detail: 
                                            {{ ucfirst($bill->seller->name) }} <br>
                                            <b style="color: green;">{{ ucfirst($bill->seller->shop_name) }}</b><br> 
                                            <b>{{ $bill->seller->phone }}</b>
                                        </td>
                                        <td colspan="4" class="align-center"> @if($bill->bill_type != 'sale') <b style="color:red;">Quotation</b> @endif </td>
                                        <td colspan="2">
                                            <b>Bill.No:</b> <span style="color:red;">
                                            #@if($bill->bill_type != 'sale')Quot-@endif{{ $bill->bill_number }}
                                            </span><br>
                                            Date: {{ $bill->bill_date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">Products</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" style="width: 20px;">#</th>
                                        <th>Product</th>
                                        <th>CGST</th>
                                        <th>SGST</th>
                                        <th>IGST</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($bill->sales as $i => $sale)
                                    <tr>
                                        <td class="text-center">{{ $i+1 }}</td>
                                        <td width="30%" class="product">
                                            {{ $sale->product_name }}
                                            <br><b>{{ $sale->hsn_code }}</b>
                                        </td>
                                        <td width="10%" class="text-center">{{ $sale->cgst }}%</td>
                                        <td width="10%" class="text-center">{{ $sale->sgst }}%</td>
                                        <td width="10%" class="text-center">{{ $sale->igst }}%</td>
                                        <td width="10%" class="text-center">{{ $sale->quantity }}</td>
                                        <td width="15%" class="text-right">{{ number_format($sale->selling_price,2)  }}</td>
                                        <td width="15%" class="text-right">{{ number_format($sale->total,2)  }}</td>
                                    </tr>
                                    @endforeach

                                    @if(count($bill->sales)>0)
                                    <tr>
                                        <td colspan="7" class="text-right"><b>Total:</b></td>
                                        <td class="text-right"><b>{{ number_format($bill->total,2) }}</b></td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div> 
                </div>
                            
                <div class="col-md-12 bill-control">
                    <a href="{{ route('bill.list') }}" class="btn btn-sm btn-info"> Bill List</a>
                    <!-- <a href="" class="btn btn-sm btn-success"> Print</a> -->
                    <!-- https://stackoverflow.com/questions/56874016/can-i-use-window-print-to-export-a-page-to-pdf-automatically -->
                    <a onclick="ExportPdf()" class="btn btn-sm btn-warning"> Download</a>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <style>
        .bill-canvas{
            padding: 30px;
        }
        td.text-center, td.product {
            font-size: 12px;
        }
    </style>

    <script>
        function ExportPdf(){ 
            kendo.drawing
                .drawDOM("#bill-canvas", 
                { 
                    forcePageBreak: ".page-break", 
                    paperSize: "A4",
                    margin: { top: "1cm", bottom: "1cm" },
                    scale: 0.8,
                    height: 500, 
                    template: $("#page-template").html(),
                    keepTogether: ".prevent-split"
                })
                    .then(function(group){
                    kendo.drawing.pdf.saveAs(group, "{{ $bill->bill_number }}.pdf")
                });
            }
    </script>