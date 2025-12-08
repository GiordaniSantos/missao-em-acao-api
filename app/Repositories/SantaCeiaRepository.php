<?php
namespace App\Repositories;

use App\Models\SantaCeia;

class SantaCeiaRepository extends AbstractRepository
{
    public function __construct(SantaCeia $model)
    {
        parent::__construct($model);
    }
}