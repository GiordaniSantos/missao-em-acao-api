<?php
namespace App\Repositories;

use App\Models\SociedadeInterna;

class SociedadeInternaRepository extends AbstractRepository
{
    public function __construct(SociedadeInterna $model)
    {
        parent::__construct($model);
    }
}