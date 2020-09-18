@extends('admin.layout.master_layout')

@section('inner-content')

                <!-- Page Content -->
                <div class="content">

                    <div class="row">
                        <div class="col-md-4" data-toggle="appear">

                            <a class="block block-rounded block-link-shadow bg-success" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <h4 class="text-white-75 mb-0">{{date("F", mktime(0, 0, 0, date('m'), 10))}} Sale</h4>
                                        <p class="text-white-75 mb-0">
                                            Rs. {{ number_format($monthly_sales, 2)}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4" data-toggle="appear">
                            <a class="block block-rounded block-link-shadow bg-danger" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-arrow-alt-circle-down text-danger-lighter"></i>
                                    </div>
                                    <div class="ml-2 text-right">
                                        <h4 class="text-white-75 mb-0">No.of Bills</h4>
                                        <p class="text-white-75 mb-0">
                                           #{{$bill_count}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4" data-toggle="appear">
                            <a class="block block-rounded block-link-shadow bg-primary" href="javascript:void(0)">
                                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                                        </div>
                                        <div class="ml-3 text-right">
                                            <h4 class="text-white-75 mb-0">Buyers</h4>
                                            <p class="text-white-75 mb-0">
                                                #{{$buyers}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" data-toggle="appear">

                            <a class="block block-rounded block-link-shadow bg-success" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <h4 class="text-white-75 mb-0">Total sales</h4>
                                        <p class="text-white-75 mb-0">
                                            Rs. {{ number_format($total_sales,2) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4" data-toggle="appear">
                            <a class="block block-rounded block-link-shadow bg-danger" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-arrow-alt-circle-down text-danger-lighter"></i>
                                    </div>
                                    <div class="ml-2 text-right">
                                        <h4 class="text-white-75 mb-0">No.of Quotations</h4>
                                        <p class="text-white-75 mb-0">
                                           #{{$quotation_count}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4" data-toggle="appear">
                            <a class="block block-rounded block-link-shadow bg-primary" href="javascript:void(0)">
                                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                                        </div>
                                        <div class="ml-3 text-right">
                                            <h4 class="text-white-75 mb-0">Sellers</h4>
                                            <p class="text-white-75 mb-0">
                                                #{{$sellers}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->





                <style>
                input[type="search"] {
             max-inline-size: -webkit-fill-available !important;
}
       
                </style>

@endsection
