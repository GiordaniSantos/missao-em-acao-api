<?php
namespace App\Repositories;

use App\Models\Discipulado;

class DiscipuladoRepository extends AbstractRepository
{
    public function __construct(Discipulado $model)
    {
        parent::__construct($model);
    }
}