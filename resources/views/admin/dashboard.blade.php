@extends('admin.layout.master_layout')

@section('inner-content')

                <!-- Page Content -->
                <div class="content">

                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12" data-toggle="appear">

                            <a class="block block-rounded block-link-shadow bg-primary" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        
                                        <p class="text-white-75 mb-0">
                                            Balance Amount
                                        </p>
                                    </div>
                                </div>
                            </a>
                        
                            <a class="block block-rounded block-link-shadow bg-danger" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-arrow-alt-circle-down text-danger-lighter"></i>
                                    </div>
                                    <div class="ml-2 text-right">
                                        
                                        <p class="text-white-75 mb-0">
                                           Customer Balance Amount
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a class="block block-rounded block-link-shadow bg-primary" href="javascript:void(0)">
                                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                                        </div>
                                        <div class="ml-3 text-right">
                                            
                                            <p class="text-white-75 mb-0">
                                                Balance Messages
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
