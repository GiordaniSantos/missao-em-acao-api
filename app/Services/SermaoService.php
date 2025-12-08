<?php 
namespace App\Services;

use App\Repositories\SermaoRepository;

class SermaoService extends AbstractService
{
    public function __construct(SermaoRepository $repository)
    {
        parent::__construct($repository);
    }
}