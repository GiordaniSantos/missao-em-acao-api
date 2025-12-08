<?php 
namespace App\Services;

use App\Repositories\HospitalRepository;

class HospitalService extends AbstractService
{
    public function __construct(HospitalRepository $repository)
    {
        parent::__construct($repository);
    }
}