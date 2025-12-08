<?php
namespace App\Repositories;

use App\Models\Presidio;

class PresidioRepository extends AbstractRepository
{
    public function __construct(Presidio $model)
    {
        parent::__construct($model);
    }
}