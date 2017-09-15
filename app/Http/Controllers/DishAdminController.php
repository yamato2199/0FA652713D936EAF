<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Shop;
class DishAdminController extends Controller
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
     public function create($shop){
        //返回前端View
        return view('ucp/dish/create',compact('shop'));
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request,$shop_id)
     {
         //
         $dishs = $request->all();
         //print_r($data);
         $Shop = Shop::find($shop_id);
         $Shop->dishs()->create($dishs);
         //Dish::create($dishs);
         //return
         //$shop_id = $request->shop_id;
         return redirect()->route('ucp.shop.show', compact('shop_id'));//0 为商店id
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
         //$data = Dish::find($id);
         $dish = Dish::find($id);
         //return $data;
         return view('ucp/dish/index',compact('dish'));
     }
 
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($shop_id,$dish_id)
     {
        //$user = Auth::user();
        //$dish = $shop->dishes()->find($id);
        //$dish = Dish::findOrFail($dish_id);
        $Shop = Shop::find($shop_id);
        $dish = $Shop->dishs()->find($dish_id);
        //return $dish;
        return view('ucp/dish.edit')->with('dish', $dish);
         
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request,$shop_id, $dish_id)
     {
         
         //$dish = Dish::find($id);
        $Shop = Shop::find($shop_id);
        //return  $Shop;
        $dish = $Shop->dishs()->find($dish_id);
        $dish->update($request->all());
         //return redirect()->route('shop.dish.show', compact('shop_id'));
        return redirect()->route('ucp.shop.show', compact('shop_id'));
         //return $request->all();
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($shop_id, $dish_id)
     {
        $Shop = Shop::find($shop_id);
        $dish = $Shop->dishs()->find($dish_id);
        $dish->delete();
        //return redirect('ucp/dish/index');
        return back();
     }
}