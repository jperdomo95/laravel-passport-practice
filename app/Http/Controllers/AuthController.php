<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AuthLoginRequest;
use Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(AuthLoginRequest $request)
    {
      try {
        $user = User::where('email', $request->email)->firstOrFail();
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
          $token = $user->createToken('Token Name', ['read-list'])->accessToken;
          return response()->json([
            'message' => 'Logged in',
            'token' => $token
          ], 200);
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
