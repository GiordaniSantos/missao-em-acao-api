<?php
namespace App\Repositories;

use App\Models\EstudoBiblico;

class EstudoBiblicoRepository extends AbstractRepository
{
    public function __construct(EstudoBiblico $model)
    {
        parent::__construct($model);
    }
}