<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\SociedadeInternaRequest;
use App\Http\Resources\SociedadeInternaListResource;
use App\Services\SociedadeInternaService;

class SociedadeInternaController extends BaseCrudController
{
    protected $service; 

    protected string $resourceCollection = SociedadeInternaListResource::class; 
    
    protected string $formRequest = SociedadeInternaRequest::class;

    public function __construct(SociedadeInternaService $service)
    {
        parent::__construct($service);
    }
}