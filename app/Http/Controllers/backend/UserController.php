<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\users;

class UserController extends Controller
{
    public function ListUser(){
        $data['users']=users::paginate(2);
        return view('backend.user.listuser',$data);
    }
    public function PostEditUser(EditUserRequest $request,$id_user ){
        $use=users::find($id_user);
        $use->email = $request->email;
        if($use->password!=""){
            $use->password = bcrypt($request->password);
        }
        $use->full = $request->full;
        $use->address = $request->address;
        $use->phone = $request->phone;
        $use->level = $request->level;
        $use->save();
        return redirect('admin/user')->with('thongbao','Đã sửa thành viên thành công');
    }
    public function EditUser($id_user){
        $data['users']=users::find($id_user);
        return view('backend.user.edituser',$data);
    }
    public function PostAddUser(AddUserRequest $request){
        $use = new users;
        $use->email = $request->email;
        $use->password = bcrypt($request->password);
        $use->full = $request->full;
        $use->address = $request->address;
        $use->phone = $request->phone;
        $use->level = $request->level;
        $use->save();
        return redirect('admin/user')->with('thongbao','Đã thêm thành viên thành công');

    }
    public function AddUser(){
        return view('backend.user.adduser');
    }
    public function DelUser($id_user){
        users::destroy($id_user);
        return redirect('admin/user')->with('thongbao','Đã xóa thành viên thành công');
    }
}
