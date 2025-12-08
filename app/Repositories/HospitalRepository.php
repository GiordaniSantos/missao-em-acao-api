<?php
namespace App\Repositories;

use App\Models\Hospital;

class HospitalRepository extends AbstractRepository
{
    public function __construct(Hospital $model)
    {
        parent::__construct($model);
    }
}