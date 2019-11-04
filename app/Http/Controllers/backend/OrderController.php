<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{order,product_order};

class OrderController extends Controller
{
    public function ListOrder(){
        $data['od']=order::where('state',2)->orderby('id','desc')->paginate(3);
        return view('backend.order.order',$data);
    }
    public function DetailOrder($id_od){
        $data['od']=order::find($id_od);
        return view('backend.order.detailorder',$data);
    }
    public function ProcessedOrder(){
        $data['od']=order::where('state',1)->orderby('updated_at','desc')->paginate(3);
        return view('backend.order.orderprocessed',$data);
    }
    public function PaidOrder($id_od){
        $od=order::find($id_od);
        $od->state=1;
        $od->save();
        return redirect('admin/order/processed');
    }
}
