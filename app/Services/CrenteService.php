<?php 
namespace App\Services;

use App\Repositories\CrenteRepository;

class CrenteService extends AbstractService
{
    public function __construct(CrenteRepository $repository)
    {
        parent::__construct($repository);
    }
}