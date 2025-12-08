<?php 
namespace App\Services;

use App\Repositories\EscolaRepository;

class EscolaService extends AbstractService
{
    public function __construct(EscolaRepository $repository)
    {
        parent::__construct($repository);
    }
}