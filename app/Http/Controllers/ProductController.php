<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\product;

use App\User;

use App\space;


use Validator;

use Auth;

use DB;

use Charts;

use App\driver_status;
class ProductController extends Controller
{
    //
    public function guest_product(Request $request){


    	$validator = Validator::make($request->all(),[

            'name' => 'required|min:6',

            'tel' => 'required',

            'xuat_phat' => 'required',

            'dich_den' => 'required',

            'thoi_gian' => 'required',

            'weight' => 'required',

            'dich_den_details' => 'required',

            'xuat_phat_details' =>'required'
        ]);


        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('mess','guest_fail');
        }

        if (Auth::check() && Auth::user()->role ==3){
            $user = product::create([
            'name' => request ('name'),

            'tel' => request ('tel'),

            'xuat_phat' => request ('xuat_phat'),

            'dich_den' => request ('dich_den'),

            'ngay_giao_hang' => request ('thoi_gian'),

            'trang_thai' => 0, //chua co nguoi xu ly
            'user_id' => Auth::user()->id,

            'weight' => request('weight'),

            
            'dich_den_details' => request('dich_den_details'),

            'xuat_phat_details' => request('xuat_phat_details')

            ]);
        }
        else{
    	$user = product::create([
    		'name' => request ('name'),

            'tel' => request ('tel'),

            'xuat_phat' => request ('xuat_phat'),

            'dich_den' => request ('dich_den'),

            'ngay_giao_hang' => request ('thoi_gian'),

            'trang_thai' => 0, //chua co nguoi xu ly

            'weight' => request('weight'),

            'dich_den_details' => request('dich_den_details'),

            'xuat_phat_details' => request('xuat_phat_details')

    		]);
        }
        //sign in
    	$request->session()->flash('guest_thanhcong', 'Bạn đã đặt đơn hàng thành công, vui lòng đợi nhân viên quản lý gọi điện xác nhận.');
 
        return back();
    }

    public function customer_product(Request $request){
        
        $validator = Validator::make($request->all(),[

            'name' => 'required|min:6',

            'tel' => 'required',

            'xuat_phat' => 'required',

            'dich_den' => 'required',

            'thoi_gian' => 'required',

            'weight' => 'required',

            'dich_den_details' => 'required',

            'xuat_phat_details' =>'required'
        ]);


        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('mess','guest_fail');
        }



        $user = product::create([
            'name' => request ('name'),

            'tel' => request ('tel'),

            'xuat_phat' => request ('xuat_phat'),

            'dich_den' => request ('dich_den'),

            'ngay_giao_hang' => request ('thoi_gian'),

            'user_id' => Auth::user()->id,

            'trang_thai' => 0, //chua co nguoi xu ly

            'weight' => request('weight'),

            'dich_den_details' => request('dich_den_details'),

            'xuat_phat_details' => request('xuat_phat_details')

            ]);
        //sign in
        $request->session()->flash('guest_thanhcong', 'Bạn đã đặt đơn hàng thành công, vui lòng đợi nhân viên quản lý gọi điện xác nhận.');
 
        return back();
    }

    public function product_list(){
        $products = product::where('user_id',Auth::user()->id)->get();
        $space = space::where('driver_id',7)->first();
        return view('product_list', compact('products','space'));
    }

    public function driver_product(){
        
        $products = product::where('driver_id',Auth::user()->id)->get();
        
        return view('driver_product', compact('products'));
    }

    

    public function plan(){
        
        $products = product::whereIn('trang_thai',[0,3])->get();
        
        return view('plan', compact('products'));
    }

    public function statistic(){
        
        $products = product::whereIn('trang_thai',[0,3])->get();

        
        
        return view('statistic', compact('products'));
    }

    public function change_plan($id){

        $product_id = $id;

        $product = product::where('id',$id)->get();

        $kg = $product[0]->weight;
        $spaces = space::whereRaw("trong_tai - current > '$kg'")->get();
        $driver_id=[];
        foreach ($spaces as $space ) {
            array_push($driver_id,$space->driver_id);
        }

        $drivers = User::whereIn('id',$driver_id);

        if($product[0]->trang_thai ==0){     
        $statuses = driver_status::whereIn('status',[0,1])->get();
        }  
        elseif ($product[0]->trang_thai==3){
          $statuses = driver_status::whereIn('status',[0,2])->get();
        }

        $driver_id_2=[];

        foreach ($statuses as $status ) {
            array_push($driver_id_2,$status->driver_id);
        }
        
        $drivers_final = $drivers->whereIn('id',$driver_id_2)->get();
        return view('change_plan', compact('product_id','drivers_final','spaces','kg'));

    }

    public function update_driver($product_id, $driver_id,Request $request){

        
        $product = product::find($product_id);

        $product->driver_id = $driver_id;
        
        if($product->trang_thai ==0){     
        $product->trang_thai = 1;
        }  
        elseif ($product->trang_thai==3){
          $product->trang_thai = 4;  
        }
        $product->save();

        $space = space::where('driver_id',$driver_id)->first();

        $space->current = $space->current + $product->weight;

        $space->save();

        $status = driver_status::where('driver_id',$driver_id)->first();

        if($product->trang_thai ==1){     
        $status->status = 1;
        }  
        elseif ($product->trang_thai==4){
          $status->status = 2;  
        }

        $status->save();

        $request->session()->flash('guest_thanhcong', 'Xác nhận tài xế thành công.');
        $products = product::whereIn('trang_thai',[0,3])->get();  
        return view('plan', compact('products'));
    }

     public function gproduct(){
        return view('gproduct');
    }
}
