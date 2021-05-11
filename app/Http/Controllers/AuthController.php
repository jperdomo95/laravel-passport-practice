<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Http\Requests\AuthLoginRequest;
use Auth, Hash;
use Laravel\Passport\{TokenRepository, RefreshTokenRepository};

class AuthController extends Controller
{
  public function __construct() {
    $this->tokenRepository = app(TokenRepository::class);
    $this->refreshTokenRepository = app(RefreshTokenRepository::class);
  }

  public function login(AuthLoginRequest $request)
  {
    try {
      $user = User::where('email', $request->email)->firstOrFail();
      if (Hash::check($request->password, $user->password)) {
        $response = $this->requestToken($request, $user);
        if($response->failed()){
          return response()->json($response, 401);
        }
        return response()->json($response->json());
      } else {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
    } catch (\Throwable $th) {
      return response()->json([
        'message' => 'Could not login',
        'error' => $th->getMessage()
      ]);
    }
  }

  private function requestToken(Request $request, $user)
  {
    $response = Http::post('http://passport.test/oauth/token', [
      'grant_type' => 'password',
      'client_id' => config('oauth.client.id'),
      'client_secret' => config('oauth.client.secret'),
      'username' => $request->email,
      'password' => $request->password,
      'scope' => implode(" ", $user->role->scopes->pluck('name')->toArray())
    ]);
    return $response;
  }

  public function logout(Request $request)
  {
    // Revoke an access token...
    $this->tokenRepository->revokeAccessToken($request->user()->token()->id);

    // Revoke all of the token's refresh tokens...
    $this->refreshTokenRepository->revokeRefreshTokensByAccessTokenId($request->user()->token()->id);
    return response()->json(['message' => 'Logged out'], 200);
  }
}
