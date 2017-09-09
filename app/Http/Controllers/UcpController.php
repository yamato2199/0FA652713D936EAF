<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UcpController extends Controller
{
    //
    public function index()
    {
        return view('ucp/index');
    }

    public function test()
    {
        return "你好未来，去你妈现在！";
    }

}
