<?php
namespace App\Repositories;

use App\Models\Incredulo;

class IncreduloRepository extends AbstractRepository
{
    public function __construct(Incredulo $model)
    {
        parent::__construct($model);
    }
}