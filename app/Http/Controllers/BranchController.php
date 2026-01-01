<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('branches.index');
    }
}
