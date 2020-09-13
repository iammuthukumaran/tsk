@extends('admin.layout.master_layout')

@section('inner-content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Edit Inward Stock</h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">


    <div class="block block-rounded block-bordered">

        <!-- inward entry -->
        <div class="block-content" id="inward-add">
            <form method="POST" action="{{ route('stock.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $stock->id }}">
                <div class="row push">
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="example-text-input"> Product <span class="text-danger">*</span></label>
                            <select id="product_name" name="product_id" class="form-control" required="required">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}" @if($stock->product_id == $product->id) selected @endif>{{ ucfirst($product->product_name) }} - {{ $product->hsn_code }}</option>
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
                                <option value="{{ $buyer->id }}" @if($stock->buyer_id == $buyer->id) selected @endif>{{ ucfirst($buyer->name) }} ({{ ucfirst($buyer->shop_name) }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="example-text-input"> Quantity <span class="text-danger">*</span></label>
                            <input type="number" min="1" id="quantity" name="quantity" class="form-control" value="{{ $stock->quantity }}" placeholder="Enter Quantity" required="required">
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="example-text-input"> Buying Price <span class="text-danger">*</span></label>
                            <input type="number" min="1" id="buying_price" name="buying_price" class="form-control" value="{{ $stock->buying_price }}" placeholder="Enter Price" required="required">
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="example-text-input"> Total <span class="text-danger">*</span></label>
                            <input type="text" id="total" name="total" class="form-control" value="{{ $stock->total }}" placeholder="0" readonly>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="example-text-input"> Date <span class="text-danger">*</span></label>
                            <input type="text" name="buy_date" class="form-control" value="{{ $stock->buy_date }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row push">
                    <div class="col-lg-12 col-xl-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button class="btn btn-info">Back</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- inward entry -->
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
    });
</script>