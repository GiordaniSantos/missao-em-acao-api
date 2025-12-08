<?php 
namespace App\Services;

use App\Repositories\BatismoInfantilRepository;

class BatismoInfantilService extends AbstractService
{
    public function __construct(BatismoInfantilRepository $repository)
    {
        parent::__construct($repository);
    }
}