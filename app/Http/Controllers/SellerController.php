<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SellerController extends Controller
{
    public function viewSeller($id)
    {
        $seller = User::where('id', $id)
        ->with('sale_details.sales')->first();
        return view('admin.seller.seller_details')->with([
            'seller' => $seller
        ]);
    }
}
