<?php
namespace App\Repositories;

use App\Models\NaoComungante;

class NaoComunganteRepository extends AbstractRepository
{
    public function __construct(NaoComungante $model)
    {
        parent::__construct($model);
    }
}