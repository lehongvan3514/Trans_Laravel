<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\product;

use App\User;

use App\space;

use Excel;


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

    public function excel(){
        
        Excel::create('Bao cao thang '.request('month'), function($excel) {

            $excel->sheet('Sheetname', function($sheet) {
            $products = product::select('id','name','ngay_giao_hang','xuat_phat_details','dich_den_details','tel','weight')->whereYear('ngay_giao_hang', '=', request('year'))
              ->whereMonth('ngay_giao_hang', '=', request('month'))
              ->get();
            $tong_tien = 0;
            foreach ($products as $product) {
                $tong_tien = $tong_tien + $product->weight;
            }
            $tong_tien = $tong_tien*1000;
                $sheet->fromArray($products);
                $sheet->fromArray(array(
                    array('',''),
                    array('Tổng thu nhập ', $tong_tien." VND")
                ),
            null, 'A1', false, false);

                
            });

        })->export('xls');
        
    }
}
