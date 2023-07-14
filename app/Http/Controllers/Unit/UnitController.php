<?php

namespace App\Http\Controllers\Unit;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    // Display all units
    public function index()
    {
        $units = Unit::all();
        return view('pages.administrator.unit.index', compact('units'));
    }

    // Show the form to create a new unit
    public function create()
    {
        return view('pages.administrator.unit.create');
    }

    // Store a new unit in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:units'
        ]);

        Unit::create($request->all());
        return redirect()->route('administrator.unit.index')->with('success', 'Unit created successfully');
    }

    // Show the form to edit a unit
    public function edit(Unit $unit)
    {
        return view('pages.administrator.unit.edit', compact('unit'));
    }

    // Update a unit in the database
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required|unique:units,name,' . $unit->id
        ]);

        $unit->update($request->all());
        return redirect()->route('administrator.unit.index')->with('success', 'Unit updated successfully');
    }

    // Delete a unit from the database
    public function destroy(Unit $unit)
    {
        try {
            $unit->delete();
            return redirect()->route('administrator.unit.index')->with('success', 'Unit deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('administrator.unit.index')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function report()
    {
        $units = Unit::all();

        if (Auth::user()->is_admin != 1) {
            $units->where('id', auth()->user()->unit_id)->first();
        }

        return view('pages.administrator.report.index', compact('units'));
    }
}
