<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

       /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->service->find($id);
        if($user === null){
            return response()->json(['erro' => 'Usuário não encontrado.'], 404);
        }
        return response()->json($user, 200);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $userAtualizado = $this->service->updateById($request->all(), $userId);

        if ($userAtualizado === null) {
            return response()->json(['erro' => 'Usuário não encontrado.'], 404);
        }

        return response()->json($userAtualizado, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->service->find($id);
        if($user === null){
            return response()->json(['erro' => 'Usuário não existe.'], 404);
        }
        $this->service->delete($user);

        return response()->json(['msg' => 'Registro deletado com sucesso!'], 200);
    }
}