<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register.
     */
    public function register(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);

        if ($newUser->save()) {
            return response()->json([
                "Nouvel Utilisateur" => $newUser,
                "Message" => "Creation d'Utilisateur Réussi !"
            ], 200);
        }
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = $request->all();

        if ($token = Auth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * respond With Token
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }

    /**
     * Logout
     */
    public function logout()
    {
        try {
            Auth::guard('api')->logout();
            return response()->json([
                "Message" => "Utilisateur Deconnecté ! "
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "Erreur" => "Non Connecté"
            ]);
        }
    }
}
