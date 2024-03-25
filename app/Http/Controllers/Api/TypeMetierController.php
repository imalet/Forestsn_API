<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeMetier\TypeMetierRequest;
use App\Models\TypeMetier;
use App\Models\User;
use Illuminate\Http\Request;

class TypeMetierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typesMetiers = TypeMetier::all();
        return response()->json($typesMetiers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeMetierRequest $request)
    {
        $typeMetier = TypeMetier::create($request->all());

        return response()->json($typeMetier, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $typeMetier = TypeMetier::findOrFail($id);
        return response()->json($typeMetier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeMetierRequest $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $typeMetier = TypeMetier::findOrFail($id);
        $typeMetier->update($validatedData);

        return response()->json($typeMetier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $typeMetier = TypeMetier::findOrFail($id);
        $typeMetier->delete();

        return response()->json(['message' => 'TypeMetier supprimé avec succès']);
    }
}
