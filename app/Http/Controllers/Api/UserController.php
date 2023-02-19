<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\UserEditRequest;
use App\Http\Requests\User\UserCreateRequest;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return UserResource::collection(
            User::orderBy('created_at', 'desc')
                ->filter($request->all())->paginate()
        );
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store(UserCreateRequest $request)
    {
        $create = User::create($request->validated());
        $create->roles()->sync($request->roles_ids);
        return new UserResource($create);
    }

    public function update(UserEditRequest $request, User $user)
    {
        $user->update($request->validated());
        if(isset($request->roles_ids)) {
            $user->roles()->sync($request->roles_ids, true);
        }
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }
}
