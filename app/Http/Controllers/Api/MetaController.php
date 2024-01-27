<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Meta\MetaCreateRequest;
use App\Http\Requests\Meta\MetaEditRequest;
use App\Http\Resources\MetaResource;
use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{

    public function index(Request $request)
    {
        return MetaResource::collection(
            Meta::orderBy('created_at', 'desc')
                ->filter($request->all())->paginate(99999999999999999999)
        );
    }

    public function show(Meta $meta)
    {
        return new MetaResource($meta);
    }

    public function store(MetaCreateRequest $request)
    {
        $data   = $request->validated();
        $create = Meta::create( $data );
        return new MetaResource($create);
    }

    public function update(MetaEditRequest $request, Meta $meta)
    {
        $data = $request->validated();
        $meta->update( $data );
        return new MetaResource($meta);
    }

    public function destroy(Meta $meta)
    {
        return response()->json($meta->delete());
    }

    public function checkMassive(Request $request)
    {
        $ids = $request->ids ?? [];
        foreach ($ids as $id) {
            $att = Meta::find($id);
            $att->update([
                "concluida" => $request->concluida
            ]);
        }
        return response()->json(true);
    }

    public function deleteMassive(Request $request)
    {
        $ids = $request->ids ?? [];
        foreach ($ids as $id) {
            $att = Meta::find($id);
            $att->delete();
        }
        return response()->json(true);
    }
}
