<?php 
namespace App\Services;

use App\Repositories\SantaCeiaRepository;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SantaCeiaService extends AbstractService
{
    public function __construct(SantaCeiaRepository $repository)
    {
        parent::__construct($repository);
    }

    public function updateByIdAndUser(array $data, int $registroId, int $userId): ?Model
    {
        $santaCeia = $this->repository->loadModel()->where('id', $registroId)->where('id_usuario', $userId)->first();

        if (!$santaCeia) {
            return null;
        }

        $santaCeia->id_usuario = $userId;
        $santaCeia->created_at = Carbon::parse($data['created_at'])->setTimezone('America/Sao_Paulo');

        $santaCeia->save();

        return $santaCeia;
    }
}