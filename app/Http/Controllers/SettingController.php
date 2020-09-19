<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class SettingController extends Controller
{
    public function settings()
    {
        $datas = User::where('id','1')->first();
        return view("admin.setting.view_setting",compact('datas'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $datas = User::where('id','1')->update([
            'shop_name' => $request->shop_name,
            'gst_number' => $request->gst_number,
            'address' => $request->address,
            'shop_address' => $request->shop_address,
            'bank_details' => $request->bank_details,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'alternate_phone' => $request->password,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('setting.view'));
    }
}
