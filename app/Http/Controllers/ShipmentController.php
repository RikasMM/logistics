<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('shipments.index');
    }
}
