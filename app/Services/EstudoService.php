<?php 
namespace App\Services;

use App\Repositories\EstudoRepository;

class EstudoService extends AbstractService
{
    public function __construct(EstudoRepository $repository)
    {
        parent::__construct($repository);
    }
}