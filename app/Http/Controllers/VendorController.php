<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::paginate(10);
        return view('vendor.index',[
            'vendors' => $vendors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'status'=> 'nullable',
        ]);

        // Vendor::create($request->all());

        Vendor::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'status'=> $request->status == true ? 1:0,
        ]);

        return redirect('/vendor')->with('status','Created Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        return view('vendor.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        return view('vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'status'=> 'nullable',
        ]);

        // Vendor::create($request->all());

        $vendor->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'status'=> $request->status == true ? 1:0,
        ]);

        return redirect('/vendor')->with('status','Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect('/vendor')->with('status','Vendor Deleted Successfully');
    }
}
