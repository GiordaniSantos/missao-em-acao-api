<?php
namespace App\Repositories;

use App\Models\Crente;

class CrenteRepository extends AbstractRepository
{
    public function __construct(Crente $model)
    {
        parent::__construct($model);
    }
}