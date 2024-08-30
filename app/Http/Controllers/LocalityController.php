<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use Illuminate\Http\Request;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localities = Locality::all();
        return response()->json($localities);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "street"=> "required|string|max:255",
            "neighborhood"=> "required|string|max:255",
            "number"=> "required|string|max:255",
            "CEP"=> "required|string|max:255",
            "city"=> "required|string|max:255",
            "state"=> "required|string|max:255",
            "country"=> "required|string|max:255",
            
        
        ]);

        $locality = Locality::create($validatedData);

        return response()->json($locality, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $locality = Locality::find($id);

        if(!$locality){
            return response()->json(["message"=> "Locality not found"],404);
        }
        return response()->json($locality);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $locality = Locality::find($id);

        if(!$locality){
            return response()->json(["message"=> "Locality not found"],404);
        }
        $validatedData = $request->validate([
            "street"=> "required|string|max:255",
            "neighborhood"=> "required|string|max:255",
            "number"=> "required|string|max:255",
            "CEP"=> "required|string|max:255",
            "city"=> "required|string|max:255",
            "state"=> "required|string|max:255",
            "country"=> "required|string|max:255",
 
        ]);

        $locality->update($validatedData);

        return response()->json($locality,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $locality = Locality::find($id);

        if(!$locality){
            return response()->json(["message"=> "not found"],404);
    }
    $locality->delete();

    return response()->json(["message"=> "Locality deleted successfully"],200);
}
}