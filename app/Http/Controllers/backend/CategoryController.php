<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;

class CategoryController extends Controller
{
    public function GetCategory(){
        $data['category']=category::all()->toarray();
        return view('backend.category.category',$data);
    }
    public function PostCategory(AddCategoryRequest $request){
        if(    GetLevel(category::all()->toarray(),$request->parent,1)>2   )
    {
        return redirect()->back()->with('error','Giao diện web không hỗ trợ Danh mục lớn hơn 2 Cấp');
    }
        $cate= new category;
        $cate->name=$request->name;
        $cate->slug=str_slug($request->name);
        $cate->parent=$request->parent;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã thêm danh mục thành công');
    }
    public function EditCategory($id_category){
        $data['cate']=category::find($id_category);
        $data['category']=category::all();
        return view('backend.category.editcategory',$data);
    }
    public function PostEditCategory(EditCategoryRequest $request,$id_category){
        if(   GetLevel(category::all()->toarray(),$request->parent,1)>2   )
        {
            return redirect()->back()->with('error','Giao diện web không hỗ trợ Danh mục lớn hơn 2 Cấp');
        }
        $cate=category::find($id_category);
        $cate->name=$request->name;
        $cate->slug=str_slug($request->name);
        $cate->parent=$request->parent;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã Sửa Danh mục thành công!');
   }
   public function DelCategory($id_category){
       $cate=category::find($id_category);
       category::where('parent',$id_category)->update(['parent'=>$cate->parent]);
       category::destroy($id_category);
       return redirect()->back()->with('thongbao','Đã Xóa Danh mục thành công!');

   }
}
