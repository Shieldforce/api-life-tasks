<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ResetPasswordUpdateRequest;
use App\Http\Requests\User\UserCreatePublicRequest;
use App\Http\Resources\UserResource;
use App\Mail\ResetPasswordMail;
use App\Models\Role;
use App\Models\User;
use App\Services\Auth\LoginService;
use App\Services\Routes\SetRoutesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

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
        //$request->user()->tokens()->delete()
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

    public function register(UserCreatePublicRequest $request)
    {
        $create = User::create($request->validated());
        $rolesIds = array_values(Role::where("name", "User")->pluck("id")->toArray());
        $create->roles()->sync($rolesIds);
        return LoginService::handleRegister($request);
    }

    public function resetPasswordSend(ResetPasswordRequest $request)
    {
        $valid = $request->safe()->only(["email"]);
        Mail::to([$valid['email']])->queue(new ResetPasswordMail($valid['email']));
        return response()->json(true);
    }

    public function resetPassword(ResetPasswordUpdateRequest $request)
    {
        $valid             = $request->validated();
        $credentials       = json_decode(Crypt::decrypt($valid["token"]), true);
        $currentMicrotime  = microtime(true) - $credentials["microtime"];
        if($currentMicrotime > "10") {
            throw new \Exception("Token expirado!");
        }
        $user              = User::find($credentials["id"]);
        $user->update($request->safe()->only(["password"]));
        return LoginService::handleResetPasword($user, $valid["password"]);
    }
}
