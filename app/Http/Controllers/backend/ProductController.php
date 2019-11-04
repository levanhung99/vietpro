<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\AddProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{product,category};

class ProductController extends Controller
{
    public function ListProduct(){
        $data['product']=product::orderby('id','desc')->paginate(3);
        return view('backend.product.listproduct',$data);
    }
    public function EditProduct($id_pro){
        $data['pro']=product::find($id_pro);
        $data['category']=category::all()->toarray();
        return view('backend.product.editproduct',$data);
    }
    public function PostEditProduct(EditProductRequest $request,$id_pro){
        $pro=product::find($id_pro);
        $pro->code = $request->product_code;
        $pro->name = $request->product_name;
        $pro->slug = str_slug($request->slug);
        $pro->price = $request->product_price;
        $pro->featured = $request->featured;
        $pro->state = $request->product_state;
        $pro->info = $request->info;
        $pro->describe = $request->description;
        if($request->hasFile('product_img'))
        {
            if($pro->img!='no-img.jpg'){
                unlink('backend/img/'.$pro->img);
            }
            $file=$request->product_img;
            $file_name=str_slug($request->product_img).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img',$file_name);
            $pro->img=$file_name;
        }
        $pro->category_id = $request->category;
        $pro->save();
        return redirect('admin/product')->with('thongbao','Đã thêm sản phẩm thành công');

    }
    public function AddProduct(){
        $data['category']=category::all()->toarray();
        return view('backend.product.addproduct',$data);
    }
    public function PostProduct(AddProductRequest $request){
        $pro= new product;
        $pro->code = $request->product_code;
        $pro->name = $request->product_name;
        $pro->slug = str_slug($request->slug);
        $pro->price = $request->product_price;
        $pro->featured = $request->featured;
        $pro->state = $request->product_state;
        $pro->info = $request->info;
        $pro->describe = $request->description;
        $pro->category_id = $request->category;
        if($request->hasFile('product_img'))
        {
         
            $file=$request->product_img;
            $file_name=str_slug($request->product_img).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img',$file_name);
            $pro->img=$file_name;
        }
        else
        {
            $pro->img='no-img.jpg';
        }
        $pro->save();
        return redirect('admin/product')->with('thongbao','Đã thêm sản phẩm thành công');

    }
    public function DelProduct($id_pro){
        product::destroy($id_pro);
        return redirect('admin/product')->with('thongbao','Đã xóa sản phẩm thành công');
    }
    public function DetailAttr(){
        return view('backend.attr.attr');
    }
    public function EditAttr(){
        return view('backend.attr.editattr');
    }
    public function EditValue(){
        return view('backend.attr.editvalue');
    }
    public function AddVariant(){
        return view('backend.variant.addvariant');    }
    public function EditVariant(){
        return view('backend.variant.editvariant');    }
}
