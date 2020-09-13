<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Todo;
use App\User;

class StockController extends Controller
{
    public function list()
    {
        $stocks = Stock::with('product', 'buyer')
        ->orderBy('id', 'desc')->get();
        $products = Todo::orderBy('id', 'desc')->get();
        $buyers = User::where('user_type', 'buyer')->orderBy('id', 'desc')->get();
        return view('admin.stock.stock_list')->with([
            'stocks' => $stocks,
            'products' => $products,
            'buyers' => $buyers
        ]);
    }

    public function add(Request $request)
    {
        unset($request['_token']);
        Stock::create($request->all());
        $stock = Todo::where('id', $request->product_id)->value('stock');
        Todo::where('id', $request->product_id)->update([
            'stock' => $stock + $request->quantity
        ]);
        return redirect(route('stock.list'))->with([
            'success' => 'New Stock Added in Inward List'
        ]);   
    }

    public function edit($id)
    {
        $stock = Stock::where('id', $id)->with('product', 'buyer')->orderBy('buy_date', 'desc')->first();
        $products = Todo::orderBy('id', 'desc')->get();
        $buyers = User::where('user_type', 'buyer')->orderBy('id', 'desc')->get();
        return view('admin.stock.stock_edit')->with([
            'stock' => $stock,
            'products' => $products,
            'buyers' => $buyers
        ]);
    }

    public function update(Request $request)
    {
        $old_stock = Stock::where('id', $request->id)->first();
        Stock::where('id', $request->id)->update([
            'product_id' => $request->product_id,
            'buyer_id' => $request->buyer_id,
            'quantity' => $request->quantity,
            'buying_price' => $request->buying_price,
            'total' => $request->total
        ]);
        $stock = Todo::where('id', $request->product_id)->value('stock');
        $qty = $request->quantity - $old_stock->quantity;
        Todo::where('id', $request->product_id)->update([
            'stock' => $stock + $qty
        ]);
        return redirect(route('stock.list'))->with([
            'success' => 'Stock Details Updated in Inward List'
        ]);
    }
}
