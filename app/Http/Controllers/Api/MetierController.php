<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Metier\MetierRequest;
use App\Http\Requests\Metier\UpdateMetierRequest;
use App\Models\Metier;
use Illuminate\Http\Request;

class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metiers = Metier::all();
        return response()->json(['metiers' => $metiers], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MetierRequest $request)
    {

        $metier = new Metier();
        $metier->image = $request->input('image');
        $metier->nom_metier = $request->input('nom_metier');
        $metier->description = $request->input('description');
        $metier->save();

        return response()->json(['message' => 'Metier créé avec succès', 'metier' => $metier], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $metier = Metier::find($id);

        if (!$metier) {
            return response()->json(['message' => 'Métier non trouvé'], 404);
        }

        return response()->json(['metier' => $metier], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMetierRequest $request, $id)
    {
        $request->validate([
            'image' => 'nullable|string',
            'nom_metier' => 'required|string',
            'description' => 'required|string',
        ]);

        $metier = Metier::find($id);

        if (!$metier) {
            return response()->json(['message' => 'Métier non trouvé'], 404);
        }

        $metier->image = $request->input('image');
        $metier->nom_metier = $request->input('nom_metier');
        $metier->description = $request->input('description');
        $metier->save();

        return response()->json(['message' => 'Métier mis à jour avec succès', 'metier' => $metier], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $metier = Metier::find($id);

        if (!$metier) {
            return response()->json(['message' => 'Métier non trouvé'], 404);
        }

        $metier->delete();

        return response()->json(['message' => 'Métier supprimé avec succès'], 200);
    }
}
