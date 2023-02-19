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
                ->filter($request->all())->paginate()
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
        return $meta::destroy($meta->id);
    }
}
