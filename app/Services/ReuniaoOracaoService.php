<?php 
namespace App\Services;

use App\Repositories\ReuniaoOracaoRepository;

class ReuniaoOracaoService extends AbstractService
{
    public function __construct(ReuniaoOracaoRepository $repository)
    {
        parent::__construct($repository);
    }
}