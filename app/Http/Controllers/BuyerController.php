<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class BuyerController extends Controller
{
    public function viewBuyer($id)
    {
        $buyer = User::where('id', $id)
        ->with('buying_details.product')->first();
        return view('admin.buyer.buyer_details')->with([
            'buyer' => $buyer
        ]);
    }
}
