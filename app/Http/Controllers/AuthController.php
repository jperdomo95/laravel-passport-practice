<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Http\Requests\AuthLoginRequest;
use Auth, Route;
use Illuminate\Auth\Authenticatable;

class AuthController extends Controller
{
  public function login(AuthLoginRequest $request)
  {
    try {
      $user = User::where('email', $request->email)->firstOrFail();
      $credentials = $request->only(['email', 'password']);
      if (Auth::attempt($credentials)) {
        die('logueado');
        // $token = $user->createToken('Token Name', ['read-list'])->accessToken;

        $clientResponse = Http::post('http://localhost:8000/oauth/token', [
          'grant_type' => 'password',
          'client_id' => config('oauth.client.id'),
          'client_secret' => config('oauth.client.secret'),
          'username' => $request->email,
          'password' => $request->password,
          'scopes' => ['read-list']
        ])->json();
        if($clientResponse->failed()){
          return response()->json([
            'message' => 'Could not login',
            'error' => $clientResponse
          ], 401);
        }

        $tokenRequest = Request::create(
          '/oauth/token',
          'post'
        );
        return Route::dispatch($tokenRequest);
      } else {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
    } catch (\Throwable $th) {
      return response()->json([
        'message' => 'Could not login',
        'error' => $th->getMessage()
      ]);
    }
    return response('This is the login endpoint', 200);
  }
}
