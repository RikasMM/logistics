<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\BranchType;
use App\Models\Region;
use App\Models\User;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::with(['type', 'region', 'manager'])->paginate(10);
        return view('branches.index', compact('branches'));
    }

    public function create()
    {
        $types = BranchType::all();
        $regions = Region::where('is_active', true)->get();
        // We will just fetch all users for now to prevent errors if roles don't exist
        $managers = User::all();
        
        return view('branches.create', compact('types', 'regions', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manager_id' => 'nullable|exists:users,id',
            'branch_type_id' => 'required|exists:branch_types,id',
            'region_id' => 'required|exists:regions,id',
            'email' => 'nullable|email',
        ]);

        Branch::create($request->all());

        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    public function edit(Branch $branch)
    {
        $types = BranchType::all();
        $regions = Region::where('is_active', true)->get();
        $managers = User::all();

        return view('branches.edit', compact('branch', 'types', 'regions', 'managers'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'branch_type_id' => 'required|exists:branch_types,id',
            'region_id' => 'required|exists:regions,id',
        ]);

        $branch->update($request->all());

        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully.');
    }
}
