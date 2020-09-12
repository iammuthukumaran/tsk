<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create()
    {
        //
        return view('admin/user/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shop_name' => 'required',
            'user_type' => 'required',
            'gst_type' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required'
        ]);
        User::create($request->all());
        return redirect(route('user.index'))->with('success', 'Agent Added Successfully!');
    }
    public function index()
    {
        $datas=User::orderBy('id','DESC')->get();
        return view('admin/user/index',compact('datas'));
    }

     public function edit($id)
    {
        //
        $datas = User::where('id',$id)->first();
      
      return view("admin/user/edit",compact('datas'));
    }
    public function update(Request $request, $id)
    {
        //
         unset($request['_token']);
        unset($request['_method']);
         User::where('id', $id)->update($request->all());
     
        return redirect(route('user.index'))->with('success','Products Updated Successfully!');
    }
    public function destroy($id)
    {
        //
        User::where('id', $id)->delete();
        return redirect(route('user.index'));
    }

}
