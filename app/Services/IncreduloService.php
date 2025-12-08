<?php 
namespace App\Services;

use App\Repositories\IncreduloRepository;

class IncreduloService extends AbstractService
{
    public function __construct(IncreduloRepository $repository)
    {
        parent::__construct($repository);
    }
}