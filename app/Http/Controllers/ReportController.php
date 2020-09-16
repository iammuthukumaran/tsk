<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;

class ReportController extends Controller
{
    public function salesReport(Request $request){
        $bills = Bill::with('sales', 'seller')
        ->where('is_billed', 'yes')
        ->where('bill_type', 'sale')
        ->orderBy('id', 'desc')->get();

        return view('admin.report.sales_report')->with([
            'bills' => $bills
        ]);
    }
}
