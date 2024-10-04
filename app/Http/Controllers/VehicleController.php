<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = vehicle::all();
        return view('fleet.vehicle.index',[
            'vehicle' => $vehicles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('fleet.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::create($request->all());
        return response()->json($vehicle, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(vehicle $vehicle)
    {
        return view('fleet.vehicle.show', compact('vehicle'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehicle $vehicle)
    {
        return view('fleet.vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehicle $vehicle)
    {
        $vehicle = Vehicle::findOrFail($vehicle);
        $vehicle->update($request->all());
        return response()->json($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehicle $vehicle)
    {
        // $vehicle = Vehicle::findOrFail($vehicle);
        // $vehicle->delete();
        // return response()->json(null, 204);
        $vehicle->delete();
        return redirect('/vehicle')->with('status','Vehicle Deleted Successfully');
    }
}
