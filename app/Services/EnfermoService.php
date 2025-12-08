<?php 
namespace App\Services;

use App\Repositories\EnfermoRepository;

class EnfermoService extends AbstractService
{
    public function __construct(EnfermoRepository $repository)
    {
        parent::__construct($repository);
    }
}