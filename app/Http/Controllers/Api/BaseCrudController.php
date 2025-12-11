<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseCrudController extends Controller
{
    protected $service;
    protected string $resourceCollection = '';
    protected string $formRequest = '';

    public function __construct($service)
    {
        $this->service = $service;
    }
 
    public function index()
    {
        $id_usuario = request('id_usuario');

        $registros = $this->service->getAllByUserId($id_usuario);

        return ($this->resourceCollection)::collection($registros);
    }

    public function store(Request $request)
    {
        $validatedData = app($this->formRequest)->validated();
        $registroCriado = $this->service->create($validatedData);

        return response()->json($registroCriado, 201);
        //return new $this->resourceCollection($registroCriado);
    }

    public function show($id)
    {
        $id_usuario = request('id_usuario');
        $registro = $this->service->findByIdAndUser($id, $id_usuario);
        if($registro === null){
            return response()->json(['erro' => 'Recurso pesquisado não existe.'], 404);
        }
        return response()->json($registro, 200);
    }

    public function update($id)
    {
        $id_usuario = request('id_usuario'); 
        $validatedData = app($this->formRequest)->validated();
      
        $registroAtualizado = $this->service->updateByIdAndUser($validatedData, $id, $id_usuario);

        return response()->json($registroAtualizado, 200);
    }

    public function destroy($id)
    {
        $id_usuario = (int) request('id_usuario');
        $deletadoComSucesso = $this->service->deleteByIdAndUserId($id, $id_usuario);

        if (!$deletadoComSucesso) {
            return response()->json(['erro' => 'Recurso pesquisado não existe.'], 404);
        }

        return response()->json(['msg' => 'Registro deletado com sucesso!'], 200);
    }
}