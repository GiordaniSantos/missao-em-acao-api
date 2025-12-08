<?php 
namespace App\Services;

use App\Repositories\DiscipuladoRepository;

class DiscipuladoService extends AbstractService
{
    public function __construct(DiscipuladoRepository $repository)
    {
        parent::__construct($repository);
    }
}