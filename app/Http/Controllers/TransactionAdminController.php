<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Transaction;


class TransactionAdminController extends Controller
{
    public function index(){
        $user = Auth::user();

        $transactions = collect();
        

        if($user->user_type == 0)
        {
            $transactions = $user->transactions;
            return view('ucp/transaction/index', compact('transactions'));
        }
        else
        {
            foreach($user->shops as $userShop)
            {
                foreach($userShop->shopSales as $shopSale)
                {
                    $transactions->push($shopSale->transaction);
                } 
            }
            //$transactions = Transaction;
            return view('ucp/transaction/index', compact('transactions'));
            //return $transactions;
            
        } 
    }

    public function show($id){
        $transaction = Transaction::findOrFail($id);
      
        

        //return $transaction;
        //return $transaction->transactionItems;
        return view('ucp/transactionItem/index', compact('transaction'));
    }

}
