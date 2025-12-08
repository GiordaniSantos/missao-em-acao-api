<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\CommonRequest;
use App\Http\Resources\CommonListResource;
use App\Services\EscolaService;

class EscolaController extends VisitaBaseCrudController
{
    protected EscolaService $service; 

    protected string $resourceCollection = CommonListResource::class; 
    
    protected string $formRequest = CommonRequest::class;

    public function __construct(EscolaService $service)
    {
        parent::__construct($service);
    }
}