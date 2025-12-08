<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\CommonRequest;
use App\Http\Resources\CommonListResource;
use App\Services\SantaCeiaService;

class SantaCeiaController extends BaseCrudController
{
    protected SantaCeiaService $service; 

    protected string $resourceCollection = CommonListResource::class; 
    
    protected string $formRequest = CommonRequest::class;

    public function __construct(SantaCeiaService $service)
    {
        parent::__construct($service);
    }
}