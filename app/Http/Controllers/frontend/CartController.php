<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use Cart;

class CartController extends Controller
{
    public function GetCart(){
        $data['cart']=Cart::content();
        $data['total']=Cart::total(0,"",".");
        return view('frontend.cart.cart',$data);
    }
    public function AddCart(request $request){
        $pro=product::find($request->id_pro);
        if($request->has('qty')){
            $qty = $request->qty;   
        }else{
            $qty = 1;
        }
        Cart::add([
            'id'=> $pro->code,
            'name'=> $pro->name,
            'qty'=> $qty,
            'price'=> $pro->price,
            'weight'=> 0,
            'options'=> ['img'=>$pro->img],
        ]);
        return redirect('cart');
    }
    public function UpdateCart($rowId,$qty){
        Cart::update($rowId,$qty);
        return "success";
    }
    function DelCart($rowId){
        Cart::remove($rowId);
        return redirect()->back();
    }
}
