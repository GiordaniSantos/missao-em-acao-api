<?php
namespace App\Repositories;

use App\Models\Escola;

class EscolaRepository extends AbstractRepository
{
    public function __construct(Escola $model)
    {
        parent::__construct($model);
    }
}