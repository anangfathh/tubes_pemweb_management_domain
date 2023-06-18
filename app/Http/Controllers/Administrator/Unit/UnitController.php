<?php

namespace App\Http\Controllers\Administrator\Unit;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Http\Controllers\Controller;

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
        $unit->delete();
        return redirect()->route('administrator.unit.index')->with('success', 'Unit deleted successfully');
    }
}
