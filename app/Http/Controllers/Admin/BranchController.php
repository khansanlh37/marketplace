<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'region' => 'required|string|max:255',
        ]);

        Branch::create([
            'name' => $request->name,
            'location' => $request->location,
            'region' => $request->region,
        ]);

        return redirect()->route('admin.branches.index')->with('success', 'Cabang berhasil ditambahkan!');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'region' => 'required|string'
        ]);
    
        $branch = Branch::findOrFail($id);
        $branch->update($validated);
    
        return redirect()->route('admin.branches.index')->with('success', 'Cabang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();

        return redirect()->route('admin.branches.index')->with('success', 'Cabang berhasil dihapus.');
    }
}
