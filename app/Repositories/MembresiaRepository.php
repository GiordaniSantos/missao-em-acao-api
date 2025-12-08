<?php
namespace App\Repositories;

use App\Models\Membresia;

class MembresiaRepository extends AbstractRepository
{
    public function __construct(Membresia $model)
    {
        parent::__construct($model);
    }
}