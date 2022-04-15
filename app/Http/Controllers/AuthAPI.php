<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\UserRole;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class AuthAPI extends Controller
{
    public function response($user)
    {
        $token = $user->createToken(str()->random(40))->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        $cred = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:4'
        ]);

        if (!Auth::attempt( $cred )) {
            return response()->json([
                'message' => 'Unauthorized.'
            ],401);
        }

        return $this->response(Auth::user());
    }

    public function logout()
    {
        Auth::user()->tokens()->delete() ;

        return response()->json([
            'message' => 'You logged out!'
        ]);
    }


    public function register(Request $request) {
        $patient = (new PatientController)->store($request) ;
        return $this->response($patient);
    }

}
