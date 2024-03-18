<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\Ecole;
use App\Models\Filiere;
use App\Models\Metier;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecole = Accreditation::find(1);

        // $ecole = $filiere->ecoles;
        return response($ecole);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
