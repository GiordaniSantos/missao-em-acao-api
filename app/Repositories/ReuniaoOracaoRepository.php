<?php
namespace App\Repositories;

use App\Models\ReuniaoOracao;

class ReuniaoOracaoRepository extends AbstractRepository
{
    public function __construct(ReuniaoOracao $model)
    {
        parent::__construct($model);
    }
}