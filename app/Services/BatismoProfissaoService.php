<?php 
namespace App\Services;

use App\Repositories\BatismoProfissaoRepository;

class BatismoProfissaoService extends AbstractService
{
    public function __construct(BatismoProfissaoRepository $repository)
    {
        parent::__construct($repository);
    }
}