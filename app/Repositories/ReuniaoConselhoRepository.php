<?php
namespace App\Repositories;

use App\Models\ReuniaoConselho;

class ReuniaoConselhoRepository extends AbstractRepository
{
    public function __construct(ReuniaoConselho $model)
    {
        parent::__construct($model);
    }
}