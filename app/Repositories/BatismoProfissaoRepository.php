<?php
namespace App\Repositories;

use App\Models\BatismoProfissao;

class BatismoProfissaoRepository extends AbstractRepository
{
    public function __construct(BatismoProfissao $model)
    {
        parent::__construct($model);
    }
}