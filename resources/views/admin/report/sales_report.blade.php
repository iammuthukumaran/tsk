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
                            <td width="30%">
                                @if($bill->seller_id)
                                {{ ucfirst($bill->seller->name) }} <br>
                                <b style="color: green;">{{ ucfirst($bill->seller->shop_name) }}</b> 
                                @endif
                            </td>
                            <td class="text-right">{{ number_format($bill->total, 2) }}</td>

                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" style="text-align:right">Total:</th>
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
                    .column( 4 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                console.log('total', total);
    
                // Total over this page
                pageTotal = api
                    .column( 4, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                console.log('pageTotal', pageTotal);
                // Update footer
                $( api.column( 4 ).footer() ).html(
                    'Rs.'+pageTotal +' ( Rs.'+ total +' )'
                );
            },
            orderCellsTop: true,
            fixedHeader: true
        } );
    } );
</script>
@endsection