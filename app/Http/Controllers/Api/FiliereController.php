<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Filiere\FiliereRequest;
use App\Http\Requests\Filiere\FiliereUpdateRequest;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::all();
        return response()->json(['filieres' => $filieres], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(FiliereRequest $request)
    {
        $filiere = Filiere::create([
            'nom_filiere' => $request->nom_filiere,
            'description_filiere' => $request->description_filiere,
        ]);

        return response()->json(['mFessage' => 'Filière ajoutée avec succès!', 'filiere' => $filiere], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        return response()->json(['filiere' => $filiere], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(FiliereUpdateRequest $request, Filiere $filiere)
    {
        
        $filiere->update([
            'nom_filiere' => $request->nom_filiere,
            'description_filiere' => $request->description_filiere,
        ]);
        // $filiere->update($request->all());

        return response()->json(['message' => 'Filière mise à jour avec succès!', 'filiere' => $filiere], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return response()->json(['message' => 'Filière supprimée avec succès!'], 200);
    }
}
