<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\CommonRequest;
use App\Http\Resources\CommonListResource;
use App\Services\BatismoInfantilService;

class BatismoInfantilController extends BaseCrudController
{
    protected BatismoInfantilService $service; 

    protected string $resourceCollection = CommonListResource::class; 
    
    protected string $formRequest = CommonRequest::class;

    public function __construct(BatismoInfantilService $service)
    {
        parent::__construct($service);
    }
}