@extends('admin.layout.master_layout')

@section('inner-content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Sales Report</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">

                <!-- <a href="" class="btn btn-primary btn-sm">
                    <i class="fa fa-fw fa-download mr-1"></i> Export
                </a> -->

            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->
<div class="content">
    <div class="">
        <form action="{{ route('report.sales') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input"> From Date </label>
                        <input type="text" id="from_date" data-date-format="yyyy/mm/dd" value="{{ $from_date }}" name="from_date" class="form-control" data-provide="datepicker">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="example-text-input"> To Date </label>
                        <input type="text" id="to_date" data-date-format="yyyy/mm/dd" value="{{ $to_date }}" name="to_date" class="form-control" data-provide="datepicker">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group" style="padding-top:1px;">
                        <label for="example-text-input"> &nbsp; </label>
                        <input id="submit" type="submit" class="btn btn-primary" value="Filter">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" style="padding-top:30px;">
                        <label for="example-text-input"> &nbsp; </label>
                        <button onclick="$('#from_date').val(''); $('#to_date').val(''); $('#submit').trigger();" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $( function() {
        $('.datepicker').datepicker();
    });
</script>
<!-- Page Content -->
<div class="content">

    <div class="block block-rounded block-bordered">
        <div class="block-content">
            <div class="table-responsive">
                
                <table id="sales-report" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 20px;">#</th>
                            <th>Bill Number</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Seller Details</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($bills as $i => $bill)
                        <tr>
                            <td class="text-center">{{ $i+1 }}</td>
                            <td class="text-left">
                                {{ $bill->bill_number }}
                            </td>
                            <td class="text-center">{{ $bill->bill_date }}</td>
                            <td width="20%">
                                @if($bill->seller_id)                                
                                    {{ ucfirst($bill->seller->name) }}
                                @endif
                            </td>
                            <td width="20%">
                                @if($bill->seller_id)
                                <b style="color: green;">{{ ucfirst($bill->seller->shop_name) }}</b> 
                                @endif
                            </td>
                            <td class="text-right" width="25%">{{ number_format($bill->total, 2) }}</td>

                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align:right">Total:</th>
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
        // Setup - add a text input to each footer cell
        $('#sales-report thead tr').clone(true).appendTo( '#sales-report thead' );
        $('#sales-report thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#sales-report').DataTable( {
            "dom": 'Bfrtip',
            "buttons": [
            'csv', 'print'
            ],
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
                    .column( 5 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                console.log('total', total);
    
                // Total over this page
                pageTotal = api
                    .column( 5, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                console.log('pageTotal', pageTotal);
                // Update footer
                $( api.column( 5 ).footer() ).html(
                    'Rs.'+pageTotal +' of ( Rs.'+ total +' )'
                );
            },
            orderCellsTop: true,
            fixedHeader: true
        } );
    } );
</script>
@endsection