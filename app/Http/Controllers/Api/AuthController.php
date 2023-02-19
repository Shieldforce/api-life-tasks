<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\UserResource;
use App\Services\Auth\LoginService;
use App\Services\Routes\SetRoutesService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(AuthLoginRequest $request)
    {
        return LoginService::handle($request);
    }

    public function verifyToken(Request $request)
    {
        return new UserResource($request->user());
    }

    public function logout(Request $request)
    {
        return response()->json([
            'logout' => $request->user()->currentAccessToken()->delete()
        ]);
    }

    public function setupRoutes()
    {
        return response()->json([
            'setup' => SetRoutesService::run()
        ]);
    }
}
