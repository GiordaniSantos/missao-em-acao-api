<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\CommonRequest;
use App\Http\Resources\CommonListResource;
use App\Services\EstudoBiblicoService;

class EstudoBiblicoController extends BaseCrudController
{
    protected EstudoBiblicoService $service; 

    protected string $resourceCollection = CommonListResource::class; 
    
    protected string $formRequest = CommonRequest::class;

    public function __construct(EstudoBiblicoService $service)
    {
        parent::__construct($service);
    }
}