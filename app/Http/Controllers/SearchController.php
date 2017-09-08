<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Shop;

class SearchController extends Controller
{
    public function all(Request $req)
    {   
        $result_shop = Shop::where('shop_name', 'LIKE','%'.$req->keyword.'%')->get();
        $result_dish = Dish::where('dishName', 'LIKE','%'.$req->keyword.'%')->get();
        
        //return response($req);
        //return $result_shop;
        return view('search/all/index',compact('result_shop'),compact('result_dish'));
    }
}
