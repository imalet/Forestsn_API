<?php

use App\Http\Controllers\Api\AccreditationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BourseController;
use App\Http\Controllers\Api\EcoleController;
use App\Http\Controllers\Api\FiliereController;
use App\Http\Controllers\Api\MetierController;
use App\Http\Controllers\Api\TypeMetierController;
use App\Http\Controllers\TestController;
use App\Models\Ecole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:api');

Route::get('/ecoles', [EcoleController::class, 'index'])->name('ecoles');
Route::post('/ecoles', [EcoleController::class, 'store'])->name('ecoles.store');
Route::get('/ecoles/{ecole}', [EcoleController::class, 'show'])->name('ecoles.show');
Route::post('/ecoles/{ecole}', [EcoleController::class, 'update'])->name('ecoles.update');
Route::delete('/ecoles/{ecole}', [EcoleController::class, 'destroy'])->name('ecoles.destroy');
Route::post('/ecoles/{id}/archive', [EcoleController::class,'archiver'])->name('ecoles.archive');

Route::get('/filieres', [FiliereController::class, 'index'])->name('filiere');
Route::post('/filieres', [FiliereController::class, 'store'])->name('filiere.store');
Route::get('/filieres/{filiere}', [FiliereController::class, 'show'])->name('filiere.show');
Route::post('/filieres/{filiere}', [FiliereController::class, 'update'])->name('filiere.update');
Route::delete('/filieres/{filiere}', [FiliereController::class, 'destroy'])->name('filiere.destroy');

Route::get('/accreditations', [AccreditationController::class, 'index'])->name('accreditations');
Route::delete('/filieres/{filiere}', [FiliereController::class, 'destroy'])->name('filiere.destroy');
Route::post('/accreditations', [AccreditationController::class, 'store'])->name('accreditations.store');
Route::get('/accreditations/{accreditation}', [AccreditationController::class, 'show'])->name('accreditations.show');
Route::post('/accreditations/{accreditation}', [AccreditationController::class, 'update'])->name('accreditations.update');
Route::delete('/accreditations/{accreditation}', [AccreditationController::class, 'destroy'])->name('accreditations.destroy');

Route::get('/bourses', [BourseController::class, 'index']); // Afficher tous les types de bourse
Route::post('/bourses', [BourseController::class, 'store']); // Ajouter un nouveau type de bourse
Route::get('/bourses/{bourse}', [BourseController::class, 'show']); // Afficher les détails d'un type de bourse spécifique
Route::post('/bourses/{bourse}', [BourseController::class, 'update']); // Modifier un type de bourse existant
Route::delete('/bourses/{bourse}', [BourseController::class, 'destroy']); // Supprimer un type de bourse

Route::get('/metiers', [MetierController::class, 'index']);
Route::post('/metiers', [MetierController::class, 'store']);
Route::get('/metiers/{id}', [MetierController::class, 'show']);
Route::post('/metiers/{id}', [MetierController::class, 'update']);
Route::delete('/metiers/{id}', [MetierController::class, 'destroy']);

Route::get('/types-metiers', [TypeMetierController::class, 'index']);
Route::get('/types-metiers/{id}', [TypeMetierController::class, 'show']);
Route::post('/types-metiers', [TypeMetierController::class, 'store']);
Route::post('/types-metiers/{id}', [TypeMetierController::class, 'update']);
Route::delete('/types-metiers/{id}', [TypeMetierController::class, 'destroy']);