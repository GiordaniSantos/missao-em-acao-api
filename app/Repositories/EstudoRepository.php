<?php
namespace App\Repositories;

use App\Models\Estudo;

class EstudoRepository extends AbstractRepository
{
    public function __construct(Estudo $model)
    {
        parent::__construct($model);
    }
}