<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\product;

use App\User;

use App\space;


class AjaxController extends Controller
{
    //

    public function product_list(){
        $products = product::where('user_id',request('id'))->get();
        return $products;
    }

    public function plan(){
        $products = product::whereIn('trang_thai',[0,3])->get();
        
        return $products;
    }

    public function driver_product(){
        $products = product::where('driver_id',request('id'))->get();
        
        return $products;
    }

    public function location_update(){

    	//
        $products = product::where('id',request('id'))->first();
        $space = space::where('driver_id',$products->driver_id)->first();
        
        return $space;
    }

    public function statistic(){
        

        $products = product::whereYear('ngay_giao_hang', '=', request('year'))
              ->whereMonth('ngay_giao_hang', '=', request('month'))
              ->get();
        
        return $products;
    }
}
