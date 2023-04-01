<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\ChatCreateRequest;
use App\Http\Requests\Chat\ChatEditRequest;
use App\Http\Resources\ChatResource;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function index(Request $request)
    {
        return ChatResource::collection(
            Chat::orderBy('created_at', 'desc')
                ->filter($request->all())->get()
        );
    }

    public function show(Chat $chat)
    {
        return new ChatResource($chat);
    }

    public function store(ChatCreateRequest $request)
    {
        $data   = $request->validated();
        $create = Chat::create( $data );
        return new ChatResource($create);
    }

    public function update(ChatEditRequest $request, Chat $chat)
    {
        $data = $request->validated();
        $chat->update( $data );
        return new ChatResource($chat);
    }

    public function destroy(Chat $chat)
    {
        return response()->json($chat->delete());
    }
}
