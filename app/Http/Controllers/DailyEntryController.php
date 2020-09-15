<?php

namespace App\Http\Controllers;
use App\Todo;
use App\Daily_entry;
use Illuminate\Http\Request;
use DB;

class DailyEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datas=Todo::orderBy('id','DESC')->get();
        return view('admin/daily_entry/create',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Daily_entry  $daily_entry
     * @return \Illuminate\Http\Response
     */
    public function show(Daily_entry $daily_entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Daily_entry  $daily_entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Daily_entry $daily_entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Daily_entry  $daily_entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daily_entry $daily_entry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Daily_entry  $daily_entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daily_entry $daily_entry)
    {
        //
    }

    public function getproductdetails(Request $request)
    {
        $product = Todo::where("id",$request->id)->first();
        
        if(!empty($product))
        {
            return response()->json(
                array(
                    'status'=>1,
                    'selling_amount' => $product->selling_amount,
                    'hsn_code' => $product->hsn_code,
                    'cgst' => $product->cgst,
                    'sgst' => $product->sgst,
                    'igst' => $product->igst,
                    'stock' => $product->stock                )
            );
        }else{
            return response()->json(array('status'=>0,'selling_amount'=>0));
        }
    }
}
