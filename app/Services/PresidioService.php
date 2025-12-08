<?php 
namespace App\Services;

use App\Repositories\PresidioRepository;

class PresidioService extends AbstractService
{
    public function __construct(PresidioRepository $repository)
    {
        parent::__construct($repository);
    }
}