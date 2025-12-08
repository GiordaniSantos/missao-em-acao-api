<?php
namespace App\Repositories;

use App\Models\BencaoNupcial;

class BencaoNupcialRepository extends AbstractRepository
{
    public function __construct(BencaoNupcial $model)
    {
        parent::__construct($model);
    }
}