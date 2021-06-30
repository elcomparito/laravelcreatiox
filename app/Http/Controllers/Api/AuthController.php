<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*public function __construct(){
        $this->middleware('client-credentials');
    }*/
    //

    public function login(Request $request)
    {

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => '0',
                'message' => 'Credenciales Incorrectas', 401
            ]);
        }

        $user = $request->user();
        /* $user_app = User::find(1);
        Auth::login($user_app); */

        //echo $user;
        if ($user->rol_id == 2) {
            $tokenData = $user->createToken('Personal Access Token Empresa');
            $token = $tokenData->token;
        } else if ($user->rol_id == 1) {
            $tokenData = $user->createToken('Personal Access Token Practicante');
            $token = $tokenData->token;
        }

        if ($token->save()) {
            if (Auth::check()) {
                if (Auth::user()->rol_id == 2) {
                    Auth::login(Auth::user());
                    return response()->json([
                        'user' => $user,
                        'rol_id' => $user->rol_id,
                        'id_users' => $user->id,
                        'email' => $user->email,
                        'access_token' => $tokenData->accessToken,
                        'token_type' => 'Bearer',
                    ], 200);
                } else if (Auth::user()->rol_id == 1) {
                    return response()->json([
                        'user' => $user,
                        'rol_id' => $user->rol_id,
                        'id_users' => $user->id,
                        'email' => $user->email,
                        'access_token' => $tokenData->accessToken,
                        'token_type' => 'Bearer',
                    ], 200);
                }
            }
        } else {
            return response()->json([
                'message' => 'Error',
                'status' => 401
            ], 401);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return view('/');
    }

    public function user(Request $request)
    {
        return response()->json([
            $request->user()
        ]);
    }
}
