<?php 
namespace App\Services;

use App\Repositories\EstudoBiblicoRepository;

class EstudoBiblicoService extends AbstractService
{
    public function __construct(EstudoBiblicoRepository $repository)
    {
        parent::__construct($repository);
    }
}