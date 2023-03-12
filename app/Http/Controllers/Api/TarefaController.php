<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tarefa\TarefaCreateRequest;
use App\Http\Requests\Tarefa\TarefaEditRequest;
use App\Http\Resources\TarefaResource;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index(Request $request)
    {
        return TarefaResource::collection(
            Tarefa::orderBy('created_at', 'desc')
                ->filter($request->all())->paginate(10)
        );
    }

    public function show(Tarefa $Tarefa)
    {
        return new TarefaResource($Tarefa);
    }

    public function store(TarefaCreateRequest $request)
    {
        $data   = $request->validated();
        $create = Tarefa::create( $data );
        return new TarefaResource($create);
    }

    public function update(TarefaEditRequest $request, Tarefa $Tarefa)
    {
        $data = $request->validated();
        $Tarefa->update( $data );
        return new TarefaResource($Tarefa);
    }

    public function destroy(Tarefa $Tarefa)
    {
        return response()->json($Tarefa->delete());
    }

    public function checkMassive(Request $request)
    {
        $ids = $request->ids ?? [];
        foreach ($ids as $id) {
            $att = Tarefa::find($id);
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
            $att = Tarefa::find($id);
            $att->delete();
        }
        return response()->json(true);
    }
}
