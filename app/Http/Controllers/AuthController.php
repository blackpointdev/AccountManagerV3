<?php


namespace App\Http\Controllers;

use App\User;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        try {
            $user = new User();
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = Hash::make($plainPassword);

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }
    }

    public  function authenticate(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['error' => 'No user with given email exists'], 400);
        }

        if (Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        }

        // Wrong credentials
        return response()->json([
            'error' => 'Email or password is wrong.'
        ], 400);
    }


    protected function jwt(User $user) {
        $payload = [
            'iss' => 'lumen-jwt',
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60*60 // Expiration time
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }
}
