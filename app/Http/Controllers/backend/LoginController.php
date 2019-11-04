<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{users,order};
use Carbon\carbon;

class LoginController extends Controller
{
    public function PostLogin(LoginRequest $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin');
        }else {
            return redirect('login')->withInput()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác!');
        }
    }
    public function GetLogin(){
        return view('backend.login.login');
    }
    public function GetIndex(){
        $month_now=carbon::now()->format('m');
        $year_now=carbon::now()->format('Y');
        for($i=1;$i <= $month_now;$i++){
            $dl['Tháng'.$i]=order::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$year_now)->sum('total');
        }
        $data['dl']=$dl;
        $data['so_dh']=order::where('state',1)->count();
        return view('backend.index',$data);
    }
    public function Logout(){
        Auth::logout();
        return redirect('login');
    }
}
