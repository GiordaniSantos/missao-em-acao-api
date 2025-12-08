<?php
namespace App\Repositories;

use App\Models\Comungante;

class ComunganteRepository extends AbstractRepository
{
    public function __construct(Comungante $model)
    {
        parent::__construct($model);
    }
}