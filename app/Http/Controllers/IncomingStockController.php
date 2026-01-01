<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomingStockController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('incoming-stock.index');
    }
}
