<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommonRequest;
use App\Http\Resources\CommonListResource;
use App\Services\CrenteService;

class CrenteController extends Controller
{
    protected $service;

    public function __construct(CrenteService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_usuario = request('id_usuario');

        $crentes = $this->service->getAllByUserId($id_usuario);

        return CommonListResource::collection($crentes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommonRequest $request)
    {
        $crente = $this->service->create($request->all());

        return response()->json($crente, 201);
    }

       /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crente  $crente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_usuario = request('id_usuario');
        $crente = $this->service->findByIdAndUser($id, $id_usuario);
        if($crente === null){
            return response()->json(['erro' => 'Recurso pesquisado não existe.'], 404);
        }
        return response()->json($crente, 200);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crente  $crente
     * @return \Illuminate\Http\Response
     */
    public function update(CommonRequest $request, $id)
    {
        $id_usuario = (int) request('id_usuario'); 
      
        $crenteAtualizado = $this->service->updateByIdAndUser($request->validated(), $id, $id_usuario);

        return response()->json($crenteAtualizado, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Crente $crente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_usuario = (int) request('id_usuario');

        $deletadoComSucesso = $this->service->deleteByIdAndUser($id, $id_usuario);

        if (!$deletadoComSucesso) {
            return response()->json(['erro' => 'Recurso pesquisado não existe.'], 404);
        }

        return response()->json(['msg' => 'Registro deletado com sucesso!'], 200);
    }
}