<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\CommonRequest;
use App\Http\Resources\CommonListResource;
use App\Services\SermaoService;

class SermaoController extends BaseCrudController
{
    protected SermaoService $service; 

    protected string $resourceCollection = CommonListResource::class; 
    
    protected string $formRequest = CommonRequest::class;

    public function __construct(SermaoService $service)
    {
        parent::__construct($service);
    }
}