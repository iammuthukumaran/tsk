<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;

class ReportController extends Controller
{
    public function salesReport(Request $request){
        // dd($request->all());
        $query = Bill::with('sales', 'seller');
        if($request->from_date != ''){
            $query->whereDate('bill_date', '>=', $request->from_date);
        }
        if($request->to_date != ''){
            $query->whereDate('bill_date', '<=', $request->to_date);
        }
        $query->where('is_billed', 'yes');
        $query->where('bill_type', 'sale');
        $bills = $query->orderBy('id', 'desc')->get();

        return view('admin.report.sales_report')->with([
            'bills' => $bills,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date
        ]);
    }
}
