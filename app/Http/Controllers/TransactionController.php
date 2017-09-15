<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Contact;
use App\Shop;
use App\TransactionItem;
use App\ShopSell;
use App\OrderItem;
use App\Order;
use App\Notification;


class TransactionController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $req,$orderID)
    {
        return $this->store($req,$orderID);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$orderID)
    {
        //return $request->all();


        $con = Contact::find($request->selected_address);
        //$con = Contact::find(4);
        //return  $con->cont_street_number;
        $order = Order::find($orderID);
       
        $shop = Shop::find($order->shop_id);
        //return $shop;
        $orderitms = OrderItem::where('order_id',$orderID)->get();
       
       
        $user = Auth::user();

        

        //创建Transaction Item
        $trans = $user->transactions()->create([
            "cust_cont_address" => $con->cont_street_number.", ".$con->cont_street.", ".$con->cont_state.", ".$con->cont_zipcode,
            "cust_phone" => $con->cont_phone,
            "cust_name" => $con->cont_firstname." ".$con->cont_lastname,
            "shop_name" => $shop->shop_name,
            "shop_address" => $shop->shop_street_number.", ".$shop->shop_street.", ".$shop->shop_city.", ".$shop->shop_state.", ".$shop->shop_zipcode,
            "shop_phone" =>  $shop->shop_phone,
            "note" => $request->note
        ]);
        
        //创建Transaction Items
        foreach($orderitms as $item)
        {
            $trans->transactionItems()->create([
                "dish_name" => $item->dish->dishName,
                "dish_price" => $item->dish->price,
            ]);

        }
        //创建ShopSell
        $trans->shopSells()->create([
            "shop_id" => $order->shop_id
        ]);
        
        //删除 order 和 order item

        $order->orderItems()->delete();
        $order->delete();
        
        //最后创建私信给通知店家

        $notify = Notification::create([
            'receiver_id' => $shop->user_id,
            'sender_id' => Auth::user()->id,
            'title' => 'You have a new order from '.Auth::user()->name,
            'body' => 'You got a new order, please check your transaction, ID:'.$trans->id
        ]);
        $notify->save();


        //return $order;
        return view("order/secuess");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
