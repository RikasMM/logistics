<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutgoingStockController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('outgoing-stock.index');
    }
}
