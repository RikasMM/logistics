<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockAdjustmentController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('stock-adjustments.index');
    }
}
