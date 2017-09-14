<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\OrderItem;
use App\Contact;
use DB;


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


    public function comfirm($orderId)
    {

        //SELECT count(`order_id`) as 'qty' FROM `order_items` WHERE `dish_id` = 1 GROUP BY `dish_id`,`shop_id`

        $orderItems = OrderItem::where('order_id',$orderId)->groupBy('dish_id','shop_id')->get();
        $order = Order::find($orderId);
        $contacts = Contact::where('user_id',Auth::user()->id)->get();

        $total_price = 0;
        
        foreach($orderItems as $orderItem)
        {
            $total_price+= $orderItem->dish->price;
        }
       
        return view('order.confirm',compact('order','orderItems','total_price','contacts'));
        //return $order->orderItemsQty;
        
    }
    public function addItem (Request $req,$shopId,$dishId){
    
        $order = Order::where('user_id',Auth::user()->id)->where('shop_id', $shopId)->first();
    
        
        if(!$order){
                $order =  new Order();
                $order->user_id=Auth::user()->id;
                $order->shop_id = $shopId;
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
        $orders = Order::where('user_id',Auth::user()->id)->get();

        /*
        if(!$order){
            $order = new Order();
            $order->user_id=Auth::user()->id;
            $order->save();
        }

        $items = $order->orderItems;
 
        
        /*
        foreach($items as $item){
            $total+=$item->dish->price;
        }
*/
        //return $order;
        return view('order.cart',compact('orders'));
    }

    public function removeItem($id){

        
        $orderItem = OrderItem::where('id', $id)->first();
        OrderItem::destroy($id);
        
        if(!OrderItem::where('shop_id', $orderItem->shop_id)->count())
        {
            $orderItem->order->delete();
            
        }
        
        /*
        if(!OrderItem::where('id', $id)->count()){
            
        }
        */
        //return redirect('/cart');
        //return OrderItem::where('shop_id', $orderItem->shop_id)->count();
        //return OrderItem::where('shop_id', $orders->shop_id)->count();
        return back();
    }

}
