<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\CommonRequest;
use App\Http\Resources\CommonListResource;
use App\Services\HospitalService;

class HospitalController extends BaseCrudController
{
    protected $service; 

    protected string $resourceCollection = CommonListResource::class; 
    
    protected string $formRequest = CommonRequest::class;

    public function __construct(HospitalService $service)
    {
        parent::__construct($service);
    }
}