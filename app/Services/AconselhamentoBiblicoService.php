<?php 
namespace App\Services;

use App\Repositories\AconselhamentoBiblicoRepository;

class AconselhamentoBiblicoService extends AbstractService
{
    public function __construct(AconselhamentoBiblicoRepository $repository)
    {
        parent::__construct($repository);
    }
}