<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class SaleController extends Controller
{
    public function list()
    {
        $sales = Sale::with('sale_bill.seller')->whereHas('sale_bill')->orderBy('id', 'desc')->get();
        return view('admin.sale.sale_list')->with([
            'sales' => $sales
        ]);
    }
}
