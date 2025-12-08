<?php
namespace App\Repositories;

use App\Models\Enfermo;

class EnfermoRepository extends AbstractRepository
{
    public function __construct(Enfermo $model)
    {
        parent::__construct($model);
    }
}