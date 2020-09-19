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
                                    <tr>
                                        <td colspan="7" align="Center">                                            
                                            <b>{{ strtoupper($shop->shop_name) }}</b>
                                            <p>{{ $shop->address }} <br>
                                            {{ $shop->shop_address }} </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">GSTIN: {{ strtoupper($shop->gst_number) }}</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Customer Detail: 
                                            {{ ucfirst($bill->seller->name) }} <br>
                                            <b style="color: green;">{{ ucfirst($bill->seller->shop_name) }}</b><br> 
                                            <b>{{ $bill->seller->phone }}</b>
                                        </td>
                                        <td colspan="2" class="align-center"> @if($bill->bill_type != 'sale') <b style="color:red;">Quotation</b> @endif </td>
                                        <td colspan="3">
                                            <b>Invoice:</b> <span style="color:red;">
                                            #@if($bill->bill_type != 'sale')Quot-@endif{{ $bill->bill_number }}
                                            </span><br>
                                            Date: {{ $bill->bill_date }}
                                            <span style="font-size:12px;" class="pull-left">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">Products</td>
                                    </tr>
                                    <tr>
                                        <td>#</td>
                                        <td>Product</td>
                                        <td>HSN</td>
                                        <td>GST</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                        <td>Total</td>
                                    </tr>

                                    @foreach($bill->sales as $i => $sale)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td> {{ $sale->product_name }}</td>
                                        <td> {{ $sale->hsn_code }}</td>
                                        <td >{{ $sale->cgst + $sale->sgst + $sale->igst }}%</td>
                                        <td >{{ $sale->quantity }}</td>
                                        <td >{{ number_format($sale->selling_price,2)  }}</td>
                                        <td >{{ number_format($sale->total,2)  }}</td>
                                    </tr>
                                    @endforeach

                                    @if(count($bill->sales)>0)
                                    <tr>
                                        <td colspan="2">
                                            Bank Details: <br>
                                            {{ $shop->bank_details }}
                                        </td>
                                        <td colspan="4" class="text-right"><b>Total:</b></td>
                                        <td class="text-right"><b>{{ number_format($bill->total,2) }}</b></td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">* Once Sold Goods can't be return Back.</td>
                                        <td colspan="3">For: {{ strtoupper($shop->shop_name) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td colspan="3">Authorized Signature</td>
                                    </tr>
                            </table>
                        </div> 
                </div>
                            
                <div class="col-md-12 bill-control">
                    <a href="{{ route('bill.list') }}" class="btn btn-sm btn-info"> Bill List</a>
                    <a onclick="printJS('bill-canvas', 'html')" class="btn btn-sm btn-success"> Print</a>
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