<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Accreditation\AccreditationRequest;
use App\Http\Requests\Accreditation\UpdateAccreditationRequest;
use App\Models\Accreditation;
use Illuminate\Http\Request;

class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accreditations = Accreditation::all();
        return response()->json(['accreditations' => $accreditations], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AccreditationRequest $request)
    {
        $accreditation = Accreditation::create([
            'type_accreditation' => $request->type_accreditation,
            'description_accreditation' => $request->description_accreditation,
        ]);

        return response()->json(['message' => 'Accréditation ajoutée avec succès!', 'accreditation' => $accreditation], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Accreditation $accreditation)
    {
        return response()->json(['accreditation' => $accreditation], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccreditationRequest $request, Accreditation $accreditation)
    {
        $request->validate([
            'type_accreditation' => 'required|string',
            'description_accreditation' => 'required|string',
        ]);

        $accreditation->update([
            'type_accreditation' => $request->type_accreditation,
            'description_accreditation' => $request->description_accreditation,
        ]);

        return response()->json(['message' => 'Accréditation mise à jour avec succès!', 'accreditation' => $accreditation], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accreditation $accreditation)
    {
        $accreditation->delete();
        return response()->json(['message' => 'Accréditation supprimée avec succès!'], 200);
    }
}
