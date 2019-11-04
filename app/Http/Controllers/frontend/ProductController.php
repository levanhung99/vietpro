<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{product,category};

class ProductController extends Controller
{
    public function GetShop(){
        $data['pro']=product::orderby('updated_at','desc')->paginate(6);
        $data['cate']=category::all();
        return view('frontend.product.shop',$data);
    }
    public function GetDetail($slug_pro){
        $data['pro']=product::where('slug',$slug_pro)->first();
        $data['pro_new']=product::orderby('id','desc')->take(8)->get();
        return view('frontend.product.detail',$data);
    }
}
