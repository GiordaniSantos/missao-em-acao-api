<?php 
namespace App\Services;

use App\Repositories\SociedadeInternaRepository;

class SociedadeInternaService extends AbstractService
{
    public function __construct(SociedadeInternaRepository $repository)
    {
        parent::__construct($repository);
    }
}