<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\CommonRequest;
use App\Http\Resources\CommonListResource;
use App\Services\IncreduloService;

class IncreduloController extends BaseCrudController
{
    protected IncreduloService $service; 

    protected string $resourceCollection = CommonListResource::class; 
    
    protected string $formRequest = CommonRequest::class;

    public function __construct(IncreduloService $service)
    {
        parent::__construct($service);
    }
}