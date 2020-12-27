@extends('admin.layout.master_layout')

@section('inner-content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        form {
            margin: 20px 0;
        }

        form input,
        button {
            padding: 6px;
            font-size: 18px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            background: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #cdcdcd;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
        }
    </style>

   

    <form method="post" action="{{ route('bill.save') }}">
        @csrf
        <input type="hidden" name="bill_id" value="{{ $bill->id }}">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">#{{$bill->bill_number}}</h1>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>Add Seller</label>
                        <select name="seller_id" id="seller_id" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" required>
                            <option value=""></option>
                            @foreach($sellers as $seller)
                            <option value="{{ $seller->id }}" @if($bill->seller_id == $seller->id) selected @endif>{{ ucfirst($seller->shop_name) }} ({{ ucfirst($seller->name) }})</option>
                            @endforeach
                        </select>
                    </div>
                    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
                   
                    <div class="col-md-2">
                        <label>Billing Type</label>
                        @if($bill_type == 'sale')
                        <select name="bill_type" readonly class="form-control" required>
                            <option value="sale">Sale</option>
                        </select>
                        @else
                        <select name="bill_type" readonly class="form-control" required>
                            <option value="quotation">Quotation</option>
                        </select>
                        @endif
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label>Product Name / Stock / HSN</label>
                        <select id="product_id" name="product_id" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" required>
                            <option value=""></option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ ucfirst($product->product_name) }} ({{ $product->stock }}) {{ $product->hsn_code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <script>
                        $('#product_id').change(function() {
                            if ($(this).val()) {
                                $.ajax({
                                    type: "GET",
                                    url: "{{url('dailyentry/get-product-details')}}",
                                    data: {
                                        "id": $(this).val()
                                    },
                                    success: function(res) {
                                        if (res) {
                                            console.log(res)
                                            $('#selling_price').val(res.selling_amount);
                                            $('#quantity').prop('max', res.stock);
                                        }
                                    }
                                });
                            } else {
                                alert('Invalid Product');
                            }
                        });
                    </script>

                    <script>
                        $(document).ready(function() {
                            $('#quantity').keyup(function() {
                                if(parseInt($('#quantity').attr('max')) < parseInt($('#quantity').val())){
                                    alert('Stock available: '+ $('#quantity').attr('max'));
                                    $('#quantity').val('');
                                    $('#total').val('0');
                                    return 0;
                                }
                                if ($('#selling_price').val() != '') {
                                    $('#total').val($('#quantity').val() * $('#selling_price').val());
                                }
                            });
                        });
                    </script>

                    <div class="col-md-2">
                        <label>Selling Price</label>
                        <input type="number" id="selling_price" class="form-control" name='selling_price' value="" placeholder="0" readonly required>
                    </div>
                    <div class="col-md-2">
                        <label>Quantity</label>
                        <input type="number" min="1" id="quantity" class="form-control" name='quantity' required />
                    </div>
                    <div class="col-md-2">
                        <label>Total</label>
                        <input type="number"  id="total" class="form-control" name='total' readonly required>
                    </div>                    
                    <div class='actions' style="padding-top:25px;">
                        <input type="submit" class="add-row btn btn-primary" value="Add"/></div>
                    </div>
                </div>
            </div>
        </form>
    
    <div class="content">
        <div class="block block-rounded block-bordered">
            <h4> Items for billing</h4>
            <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 20px;">#</th>
                            <th>Product Name</th>
                            <th>HSN</th>
                            <th>GST</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($bill->sales as $i => $sale)
                        <tr>
                            <td class="text-center">{{ $i+1 }}</td>
                            <td>{{ $sale->product_name }}</td>
                            <td>{{ $sale->hsn_code }}</td>
                            <td class="text-center">{{ $sale->cgst + $sale->sgst + $sale->igst }}%</td>
                            <td class="text-center">{{ $sale->quantity }}</td>
                            <td class="text-right">{{ number_format($sale->selling_price,2)  }}</td>
                            <td class="text-right">{{ number_format($sale->total,2)  }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="{{ route('bill.delete', [ 'sale_id' => $sale->id, 'bill_id' => $bill->id, 'bill_type' => $bill->bill_type ]) }}" class="btn btn-sm btn-outline-info"> delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if(count($bill->sales)>0)
                        <tr>
                            <td colspan="6" class="text-right"><b>Total:</b></td>
                            <td class="text-right"><b>{{ number_format($bill->total,2) }}</b></td>
                            <td>
                            <a href="{{ route('bill.generate', [ 'bill_id' => $bill->id, 'bill_type' => $bill->bill_type ]) }}" class="btn btn-success">Generate Bill</a>
                            </td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>












    <!-- <div class="dropdown dropdown-scroll">
<button class="btn btn-default event-button dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
    <span>Search</span>
    <span class="caret"></span>
</button>
<div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <div class="input-group input-group-sm search-control">
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-search"></span>
        </span>
        <input type="text" class="form-control" placeholder="Search">
    </div>
    <ul class="dropdown-list">
        <li role="presentation">
            <a>gfgsgsgf</a>
        </li>
    </ul>
</div> -->

<style>
    .dropdown.dropdown-scroll .dropdown-list{
    max-height: 233px;
    overflow-y: auto;
    list-style-type: none;
    padding-left: 10px;
    margin-bottom: 0px;
}
.dropdown-list  li{
    font-size: 14px;
    height: 20px;
}

.dropdown-list  li > a{
    color: black;
}
.dropdown-list a:hover{
   color: black;
}

.dropdown-list li:hover{
    background-color: lightgray;
}
</style>
    @endsection