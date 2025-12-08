<?php
namespace App\Repositories;

use App\Models\BatismoInfantil;

class BatismoInfantilRepository extends AbstractRepository
{
    public function __construct(BatismoInfantil $model)
    {
        parent::__construct($model);
    }
}