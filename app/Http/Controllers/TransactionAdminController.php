<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaction;

class TransactionAdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        $transactions = $user->transactions;
        return view('ucp/transaction/index', compact('transactions'));
    }

    public function show($id){
        $transaction = Transaction::where('id', $id)->get();
        $transactionItems = $transaction->transactionItems;
        return $transactionItems;

        //return view('ucp/transactionItem/index', compact('transactionItems', 'transaction'));
    }

}
