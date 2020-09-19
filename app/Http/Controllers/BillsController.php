<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Todo;
use App\User;
use App\Sale;

class BillsController extends Controller
{
    public function createBill($bill_type)
    {
        $bill = new Bill;
        $bill->save();
        $old_bill_count = Bill::where('bill_type', 'sale')->count();
        if($bill_type == 'sale'){
            Bill::where('id', $bill->id)->update([
                'bill_number' => sprintf("%03d", $old_bill_count + 1),
                'bill_date' => date('Y-m-d'),
                'bill_type' => $bill_type
            ]);
        }

        return redirect(route('bill.make', [ 'bill_id' => $bill->id, 'bill_type' => $bill_type ]));
    }

    public function makeBill($bill_id, $bill_type)
    {
        $bill = Bill::where('id', $bill_id)->first();
        $products = Todo::where('stock', '>=', '1')->get();
        $sellers = User::where('user_type', 'seller')->get();
        return view('admin.bill.create_bill')->with([
            'bill' => $bill,
            'products' => $products,
            'sellers' => $sellers,
            'bill_type' => $bill_type
        ]);
    }

    public function listBill()
    {
        $bills = Bill::with('sales', 'seller')->orderBy('id', 'desc')->get();

        return view('admin.bill.list_bill')->with([
            'bills' => $bills
        ]);
    }

    public function saveBill(Request $request)
    {
        $old_bill_total = Sale::where('bill_id', $request->bill_id)->sum('total');
        Bill::where('id', $request->bill_id)->update([
            'seller_id' => $request->seller_id,
            'bill_type' => $request->bill_type,
            'bill_date' => date('Y-m-d'),
            'total' => ($request->total + $old_bill_total)
        ]);
        $product = Todo::where('id', $request->product_id)->first();
        $gst_type = User::where('id', $request->seller_id)->value('gst_type');
            
        // Sale Product Entry
        $same_product = Sale::where('bill_id', $request->bill_id)->where('product_id', $request->product_id)->first();
        if($same_product){
            Sale::where('id', $same_product->id)->update([
                'quantity' => ($same_product->quantity + $request->quantity),
                'total' => ($same_product->total + $request->total)
            ]);
        }else{            
            $sale = new Sale;
            $sale->bill_id = $request->bill_id;
            $sale->product_id = $request->product_id;
            $sale->product_name = $product->product_name;
            $sale->hsn_code = $product->hsn_code;
            $sale->cgst = $gst_type == 'our_state' ? $product->cgst : 0;
            $sale->sgst = $gst_type == 'our_state' ? $product->sgst : 0;
            $sale->igst = $gst_type == 'other_state' ? $product->igst : 0;
            $sale->quantity = $request->quantity;
            $sale->selling_price = $request->selling_price;
            $sale->total = $request->total;
            $sale->save();
        }

        if($request->bill_type == 'sale'){
            // Reduce In stock if sale; not for quotation
            Todo::where('id', $request->product_id)->update([
                'stock' =>  ($product->stock - $request->quantity)
            ]); 
        }       

        return redirect(route('bill.make', [ 'bill_id' => $request->bill_id , 'bill_type' => $request->bill_type ]));
    }

    public function deleteBill($sale_id, $bill_id, $bill_type){
        $old_sale = Sale::where('id', $sale_id)->first();
        $product = Todo::where('id', $old_sale->product_id)->first();
        $bill = Bill::where('id', $bill_id)->first();
        // Add in stock; if sale; not for quotation
        Todo::where('id', $old_sale->product_id)->update([
            'stock' =>  ($product->stock + $old_sale->quantity)
        ]);
        Bill::where('id', $bill_id)->update([
            'total' => ($bill->total - $old_sale->total)
        ]);
        Sale::where('id', $sale_id)->delete();
        return redirect(route('bill.make', [ 'bill_id' => $bill_id , 'bill_type' => $bill_type ]));
    }
    public function generateBill($bill_id, $bill_type){
        Bill::where('id', $bill_id)->update([
            'is_billed' => 'yes'
        ]);
        return redirect(route('bill.view', [ 'bill_id' => $bill_id , 'bill_type' => $bill_type ]));
    }

    public function viewBill($bill_id, $bill_type)
    {
        $shop = User::where('id', '1')->first();
        $bill = Bill::with('sales')->where('id', $bill_id)->first();
        return view('admin.bill.view_bill')->with([
            'bill' => $bill,
            'shop' => $shop
        ]);
    }
}
