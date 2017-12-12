<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\product;
use App\space;


class ScriptController extends Controller
{
    //
    public function login_android(Request $request){

        if ($request->has('id')){
            $user = User::where('id',request('id'))->first();
            $check =array('check'=>0);
            if (!empty($user)){
                $check = array('check'=>1,'id'=>$user->id,'name'=>$user->name);
            
            }
        }
        else
        {
        	$user = User::where('email',request('email'))->first();
        	$check =array('check'=>0);
            
            if (!empty($user)){
        	if (Hash::check(request('pass'),$user->password)) {
        		$check = array('check'=>1,'id'=>$user->id,'name'=>$user->name);
        	}
            }
        }
        return view('script.login_android',compact('check'));
    }

    public function getproducts_android(){

    	$product = product::where('driver_id',request('id'))->get();
    	
    	

        return view('script.getproducts_android',compact('product'));
    }

    public function update_location_android(){
    	$check =array('check'=>0);

    	$space = space::where('driver_id',request('driver_id'))->first();

    	$space->lat = request('lat');

        $space->lng = request('lng');

    	$space->save();
    	
    	$check =array('check'=>1);

        return view('script.update_location_android',compact('check'));
    }

    public function change_status_android(Request $request){
    	$check =array('check'=>0);
    	$status = request('status');
    	if ($status=="start"){
    	$product = product::where('id',request('product_id'))->first();
    	
    	
        if($product->trang_thai ==1){     
        $product->trang_thai = 2;
        $check =array('check'=>1);
        }  
        elseif ($product->trang_thai==4){
          $product->trang_thai = 5;
          $check =array('check'=>1);  
        }
        $product->save();
    	} else {

    		$product = product::where('id',request('product_id'))->first();
	    	
	        if($product->trang_thai ==2){     
	        $product->trang_thai = 3;
	        $check =array('check'=>1);
	        }  
	        elseif ($product->trang_thai==5){
	          $product->trang_thai = 6;
	          $check =array('check'=>1);  
	        }
	        $product->save();
    	}
        return view('script.change_status',compact('check'));
    }


}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    