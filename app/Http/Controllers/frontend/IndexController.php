<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{product,category};

class IndexController extends Controller
{
    public function GetIndex(){
        $data['pro_new']=product::orderby('id','desc')->take(8)->get();
        $data['pro_nb']=product::where('featured',1)->take(4)->get();
        return view('frontend.index',$data);
    }
    public function GetAbout(){
        return view('frontend.about');
    }
    public function GetContact(){
        return view('frontend.contact');
    }
    public function GetProCate($pro_cate){
        $data['pro']=category::where('slug',$pro_cate)->first()->prd()->paginate(6);
        $data['cate']=category::all();
        return view('frontend.product.shop',$data);
    }
    public function GetFilter(request $request){
        $data['pro']=product::whereBetween('price',[$request->start,$request->end])->paginate(6);
        $data['cate']=category::all();
        return view('frontend.product.shop',$data);
    }
}
