<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\User;


class DashboardController extends Controller
{
    public function dashboard()
    {

        return view('admin/dashboard')->with([
            'total_sales' => Bill::where('bill_type', 'sale')->sum('total'),
            'monthly_sales' => Bill::where('bill_type', 'sale')->whereRaw('MONTH(bill_date) = ?',date('m'))->whereRaw('YEAR(bill_date) = ?',date('Y'))->sum('total'),
            'bill_count' => Bill::where('bill_type', 'sale')->count(),
            'quotation_count' => Bill::where('bill_type', 'quotation')->count(),
            'sellers' => User::where('user_type', 'seller')->count(),
            'buyers' => User::where('user_type', 'buyer')->count(),
        ]);
    }
}
