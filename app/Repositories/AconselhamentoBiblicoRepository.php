<?php
namespace App\Repositories;

use App\Models\AconselhamentoBiblico;

class AconselhamentoBiblicoRepository extends AbstractRepository
{
    public function __construct(AconselhamentoBiblico $model)
    {
        parent::__construct($model);
    }
}