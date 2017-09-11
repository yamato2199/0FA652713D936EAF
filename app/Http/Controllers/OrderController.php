<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\OrderItem;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
         //
    }

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function cofirm(Request $req,$shop_id)
    {
        return $req->all();
    }
    public function addItem (Request $req,$shopId,$dishId){
    
        $order = Order::where('user_id',Auth::user()->id)->first();
    
        if(!$order){
                $order =  new Order();
                $order->user_id=Auth::user()->id;
                $order->save();
        }
    
        $orderItem  = new Orderitem();
        $orderItem->dish_id=$dishId;
        $orderItem->shop_id=$shopId;
        $orderItem->order_id= $order->id;
        $orderItem->save();
    
        //return redirect('/cart');
        return back();
        
        
        
    }
    public function showCart(){
        $order = Order::where('user_id',Auth::user()->id)->first();

        if(!$order){
            $order = new Order();
            $order->user_id=Auth::user()->id;
            $order->save();
        }

        $items = $order->orderItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->dish->price;
        }

        return view('order.cart',compact('items'),compact('total'));
    }

    public function removeItem($id){

        OrderItem::destroy($id);
        //return redirect('/cart');
        return back();
    }

}
