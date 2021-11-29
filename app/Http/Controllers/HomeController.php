<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.home');
        }else {
            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }
    }

    public function index(){
    	
            $data = product::paginate(3);
    		return view('user.home',compact('data'));	
    	
    }

    public function menuproduct(){

            $data = product::paginate(9);
            return view('user.menuproduct',compact('data'));   
        
        
    }    
}
