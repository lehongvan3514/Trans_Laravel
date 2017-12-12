<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Validator;

use Auth;

use Hash;

use App\space;

use App\driver_status;
class AuthController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }

    public function change_pass(){

        return view('change_pass');
    }

    public function update_pass(Request $request){

        $validator = Validator::make($request->all(),[

            'oldpass' => 'required',

            'newpass' => 'required|confirmed'
        ]);


        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('mess','change pass');
        }
 
        $user = User::find(Auth::id());
        $hashedPassword = $user->password;
 
        if (Hash::check($request->oldpass, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->newpass)
            ])->save();
 
            $request->session()->flash('passsuccess', 'Mật khẩu của bạn đã được thay đổi thành công.');
 
            return back();
        }
 
        $request->session()->flash('passfailure', 'Vui lòng nhập lại mật khẩu cũ chính xác.');
 
        return back();
    }

    public function acc_role(){

       
        return view('acc_role');
    }

    public function panel(){
    	return view('panel');
    }

    public function account($id){

        $user = User::find($id);

        return view('account_view', compact('user'));
    }
    public function change_role(Request $request){
        $user = User::find(request('id'));
        $id = request('id');
        
        if (request('role')==2) {
            //tao du lieu trong tai
            $space = new space;
            $space->trong_tai = request('space');
            $space->driver_id = request('id');
            $space->current = 0;
            $space->save();

            $status = new driver_status;
            $status->driver_id = request('id');
            $status->status = 0;
            $status->save();
        }
        else{
            $status = driver_status::where('driver_id',request('id'))->first();
            if ($status->status != 0) {
                $request->session()->flash('outofpermission', 'Tài xế vẫn đang trong qua trình giao/nhận hàng, vui lòng thử lại khi đơn hàng hoàn thành.');
                return redirect('/' . $id);
            }
            $status = driver_status::where('driver_id',request('id'))->delete();
            $space = space::where('driver_id',request('id'))->delete();
        }
        $user->role = request('role');
        $user->save();
        return redirect('/' . $id);
    }

    public function open_user(Request $request){

        $user = User::where('email',request('email'))->first();
        if ($user->role ==1){
            $request->session()->flash('outofpermission', 'Bạn không có quyền chỉnh sửa với tài khoản này.');
 
            return back();
        }
        return redirect('/' . $user->id );
    }

    public function customer(){
        return view('customer');
    }

    public function driver(){
        return view('driver');
    }

    public function create_product(){
        return view('create_product');
    }
    
    
}
