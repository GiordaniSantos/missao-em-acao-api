<?php 
namespace App\Services;

use App\Repositories\BencaoNupcialRepository;

class BencaoNupcialService extends AbstractService
{
    public function __construct(BencaoNupcialRepository $repository)
    {
        parent::__construct($repository);
    }
}