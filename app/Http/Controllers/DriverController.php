<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = driver::all();
        return view('fleet.driver.index',[
            'driver' => $drivers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fleet.driver.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255|unique:driver',
            'contact_number' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string|max:500',
            'certifications' => 'nullable|string',
            'license_expiry_date' => 'nullable|date',
            'assigned_vehicle' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
        ]);

        Driver::create($validatedData);

        return redirect()->route('driver.index')->with('success', 'Driver added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $drivers)
    {
        return view('fleet.driver.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return view('driver.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255|unique:driver,license_number,' . $driver->id,
            'contact_number' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string|max:500',
            'certifications' => 'nullable|string',
            'license_expiry_date' => 'nullable|date',
            'assigned_vehicle' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
        ]);

        $driver->update($validatedData);

        return redirect()->route('driver.index')->with('success', 'Driver updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()->route('driver.index')->with('success', 'Driver deleted successfully.');
    }
}
