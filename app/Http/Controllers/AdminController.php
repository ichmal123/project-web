<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
   	public function product()
    {
    	return redirect('login');
    	$usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.product');
        }else {
            return redirect('self-market');
        }
    	
    }
    public function uploadProduct(Request $request)
    {
    	$data = new product;
    	$image = $request->file;
    	$imagename = time().'.'.$image->getClientOriginalExtension();
    	$request->file->move('productimage',$imagename);
    	$data->image=$imagename;
    	$data->title=$request->title;
    	$data->price=$request->price;
    	$data->description=$request->des;
    	$data->quantity=$request->quantity;
    	$data->save();
    	return redirect()->back()->with('message','Product Added Successfully');
    }
    public function showproduct()
    {
    	return redirect('login');
    	$usertype = Auth::user()->usertype;
        if($usertype == '1'){
            $data = product::all();
    		return view('admin.showproduct',compact('data'));
        }else{
            return redirect('self-market');
        }
    }

    public function deleteproduct($id){
        return redirect('login');
    	$usertype = Auth::user()->usertype;
        if($usertype == '1'){
            $data = product::find($id);
    		$data ->delete();

    		return redirect()->back()->with('message','Product Deleted Successfully');
        }else{
            return redirect('self-market');
        }
    }
}
