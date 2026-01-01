<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('inventory.index');
    }
}
