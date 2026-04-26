<?php 
namespace App\Services;

use App\Repositories\ReuniaoConselhoRepository;

class ReuniaoConselhoService extends AbstractService
{
    public function __construct(ReuniaoConselhoRepository $repository)
    {
        parent::__construct($repository);
    }
}