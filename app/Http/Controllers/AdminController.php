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
            return view('admin.product');
    	
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

    public function updateproduct(Request $request, $id){
    	$data = product::find($id);
    	$image = $request->file;
    	if ($image) {
    		$imagename = time().'.'.$image->getClientOriginalExtension();
    		$request->file->move('productimage',$imagename);
    		$data->image=$imagename;
    	}
    	$data->title=$request->title;
    	$data->price=$request->price;
    	$data->description=$request->des;
    	$data->quantity=$request->quantity;
    	$data->save();
    	return redirect('showproduct')->with('message','Product Updated Successfully');	
    }

    public function showproduct()
    {
            $data = product::all();
    		return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id){
            $data = product::find($id);
    		$data ->delete();

    		return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function updateview($id){
    	$data = product::find($id);
    	return view('admin.updateview',compact('data'));
    }
}
