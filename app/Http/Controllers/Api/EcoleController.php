<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ecole\EcoleRequest;
use App\Http\Requests\Ecole\UpdateEcoleRequest;
use App\Models\Ecole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = Ecole::all(); // Récupère toutes les écoles depuis la base de données
        return response($ecoles); // Afficher au format JSON les écoles
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EcoleRequest $request)
    {
        // return response($request);

        // Stockage des fichiers imageFont et logo dans le dossier de stockage (storage/app/public)
        $imageFontPath = $request->file('imageFont')->store('public');
        $logoPath = $request->file('logo')->store('public');

        // Création d'une nouvelle école avec les données validées
        $ecole = new Ecole();
        $ecole->imageFont = $imageFontPath;
        $ecole->logo = $logoPath;
        $ecole->nom_ecole = $request['nom_ecole'];
        $ecole->abreviation_nom = $request['abreviation_nom'];
        $ecole->description = $request['description'];
        $ecole->frais_scolaire = $request['frais_scolaire'];

        if ($ecole->save()) {
            return "Super c'est Stocker";
        }
        return "Bad c'est pas stocker";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ecole = Ecole::find($id); // Recherche une école par son identifiant, en renvoyant une erreur 404 si non trouvée

        if (!$ecole) {
            return response("L'école n'existe pas !"); // Retourne un message indiquant que l'école n'existe pas
        }

        return response($ecole); // Retourne la vue avec les données de l'école
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEcoleRequest $request, Ecole $ecole)
    {

        // Vérification si les fichiers imageFont et logo existent dans la requête
        if ($request->hasFile('imageFont') && $request->hasFile('logo')) {
            // Suppression des anciens fichiers imageFont et logo
            Storage::delete([$ecole->imageFont, $ecole->logo]);

            // Stockage des nouveaux fichiers imageFont et logo dans le dossier de stockage (storage/app/public)
            $imageFontPath = $request->file('imageFont')->store('public');
            $logoPath = $request->file('logo')->store('public');

            // Mise à jour des données de l'école avec les nouveaux fichiers
            $ecole->imageFont = $imageFontPath;
            $ecole->logo = $logoPath;
        }

        // Mise à jour des autres données de l'école
        $ecole->nom_ecole = $request->nom_ecole;
        $ecole->abreviation_nom = $request->abreviation_nom;
        $ecole->description = $request->description;
        $ecole->frais_scolaire = $request->frais_scolaire;

        if ($ecole->save()) {
            return "Super, c'est mis à jour !";
        }
        return "Désolé, la mise à jour n'a pas réussi.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ecole = Ecole::find($id); // Recherche une école par son identifiant

        if (!$ecole) {
            return response("L'école n'existe pas !"); // Retourne un message indiquant que l'école n'existe pas
        }

        // Suppression des fichiers imageFont et logo associés à l'école
        Storage::delete([$ecole->imageFont, $ecole->logo]);

        // Suppression de l'école de la base de données
        if ($ecole->delete()) {
            return response("Super, l'école a été supprimée !"); // Retourne un message de succès
        }

        return "Désolé, la suppression de l'école n'a pas réussi."; // Retourne un message en cas d'échec de la suppression
    }
}
