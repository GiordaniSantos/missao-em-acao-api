<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\MembresiaRequest;
use App\Http\Resources\MembresiaListResource;
use App\Services\MembresiaService;

class MembresiaController extends BaseCrudController
{
    protected MembresiaService $service; 

    protected string $resourceCollection = MembresiaListResource::class; 
    
    protected string $formRequest = MembresiaRequest::class;

    public function __construct(MembresiaService $service)
    {
        parent::__construct($service);
    }
}