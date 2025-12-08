<?php
namespace App\Repositories;

use App\Models\Sermao;

class SermaoRepository extends AbstractRepository
{
    public function __construct(Sermao $model)
    {
        parent::__construct($model);
    }
}