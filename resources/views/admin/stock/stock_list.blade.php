@extends('admin.layout.master_layout')

@section('inner-content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Stock Inwards</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <button id="add-product" class="btn btn-primary btn-sm">Add Product</button>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">


    <div class="block block-rounded block-bordered">

        <!-- inward entry -->
        <div class="block-content" id="inward-add" style="display:none">

            <div class="block-header block-header-default">
                <h3 class="block-title">Add Stock Inward</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option">
                        <i class="si si-settings"></i>
                    </button>
                </div>
            </div>
            <form method="POST" action="{{ route('stock.add') }}">
                @csrf
                <div class="row push">
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="example-text-input"> Product <span class="text-danger">*</span></label>
                            <select id="product_name" name="product_id" class="form-control" required="required">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                <option value="{{$product->id }}">{{ ucfirst($product->product_name) }} - {{ $product->hsn_code }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="example-text-input"> Buyer <span class="text-danger">*</span></label>
                            <select id="buyer_id" name="buyer_id" class="form-control" required="required">
                                <option value="">Select Buyer</option>
                                @foreach ($buyers as $buyer)
                                <option value="{{$buyer->id }}">{{ ucfirst($buyer->name) }} ({{ ucfirst($buyer->shop_name) }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="example-text-input"> Quantity <span class="text-danger">*</span></label>
                            <input type="number" min="1" id="quantity" name="quantity" class="form-control" value="" placeholder="Enter Quantity" required="required">
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="example-text-input"> Buying Price <span class="text-danger">*</span></label>
                            <input type="number" min="1" id="buying_price" name="buying_price" class="form-control" value="" placeholder="Enter Price" required="required">
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="example-text-input"> Total <span class="text-danger">*</span></label>
                            <input type="text" id="total" name="total" class="form-control" value="" placeholder="0" readonly>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="example-text-input"> Date <span class="text-danger">*</span></label>
                            <input type="text" name="buy_date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row push">
                    <div class="col-lg-12 col-xl-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button class="btn btn-info">Back</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- inward entry -->

        <div class="block-header block-header-default">
            <h3 class="block-title">Inward List</h3>
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
                            <th style="width: 15%;">Date</th>
                            <th style="width: 20%;">Product</th>
                            <th style="width: 20%;">Buyer</th>
                            <th style="width: 10%;">Qty</th>
                            <th style="width: 10%;">Price</th>
                            <th style="width: 15%;">Total</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($stocks as $key => $stock)

                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td align="center">{{ $stock->buy_date }}</td>
                            <td>
                                {{ $stock->product->product_name }} <br>
                                <span style="color:green; font-size:12px;">{{ $stock->product->hsn_code }}</span>
                            </td>
                            <td>
                                {{ $stock->buyer->name }} <br>
                                <a href="{{ route('buyer.view', [ 'id' => $stock->buyer_id ]) }}">
                                    <span style="color:blue; font-size:12px;">{{ $stock->buyer->shop_name }}</span>
                                </a>
                            </td>
                            <td>{{ $stock->quantity }}</td>
                            <td align="right">{{ number_format($stock->buying_price,2) }}</td>
                            <td align="right">{{ number_format($stock->total,2) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" id="dropdown-default-outline-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-default-outline-info">
                                    <a class="dropdown-item" href="{{ route('stock.edit', $stock->id) }}">
                                    <i class="fa fa-fw fa-edit"></i> Edit</a>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#quantity').keyup(function() {
            if ($('#buying_price').val() != '') {
                $('#total').val($('#quantity').val() * $('#buying_price').val());
            }
        });
        $('#buying_price').keyup(function() {
            if ($('#quantity').val() != '') {
                $('#total').val($('#quantity').val() * $('#buying_price').val());
            }
        });
        $('#add-product').click(function() {
            $('#inward-add').show();
        });
    });
</script>