<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\ComunganteNaoComunganteRequest;
use App\Services\NaoComunganteService;

class NaoComunganteController extends VisitaBaseCrudController
{
    protected NaoComunganteService $service; 

    // protected string $resourceCollection = CommonListResource::class; 
    
    protected string $formRequest = ComunganteNaoComunganteRequest::class;

    public function __construct(NaoComunganteService $service)
    {
        parent::__construct($service);
    }

    public function index()
    {
        $id_usuario = request('id_usuario');

        return $this->service->getFirst($id_usuario);
    }
}