<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\CommonRequest;
use App\Http\Resources\CommonListResource;
use App\Services\EstudoService;

class EstudoController extends BaseCrudController
{
    protected $service; 

    protected string $resourceCollection = CommonListResource::class; 
    
    protected string $formRequest = CommonRequest::class;

    public function __construct(EstudoService $service)
    {
        parent::__construct($service);
    }
}