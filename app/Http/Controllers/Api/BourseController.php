<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bourse;
use Illuminate\Http\Request;

class BourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bourses = Bourse::all();
        return response()->json(['bourses' => $bourses], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_bourse' => 'required|string',
            'description_type_bourse' => 'required|string',
        ]);

        $bourse = Bourse::create([
            'type_bourse' => $request->type_bourse,
            'description_type_bourse' => $request->description_type_bourse,
        ]);

        return response()->json(['message' => 'Type de bourse ajouté avec succès!', 'bourse' => $bourse], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Bourse $bourse)
    {
        return response()->json(['bourse' => $bourse], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bourse $bourse)
    {
        $request->validate([
            'type_bourse' => 'required|string',
            'description_type_bourse' => 'required|string',
        ]);

        $bourse->update([
            'type_bourse' => $request->type_bourse,
            'description_type_bourse' => $request->description_type_bourse,
        ]);

        return response()->json(['message' => 'Type de bourse mis à jour avec succès!', 'bourse' => $bourse], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bourse $bourse)
    {
        $bourse->delete();
        return response()->json(['message' => 'Type de bourse supprimé avec succès!'], 200);
    }
}
