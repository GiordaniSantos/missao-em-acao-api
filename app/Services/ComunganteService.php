<?php 
namespace App\Services;

use App\Repositories\ComunganteRepository;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ComunganteService extends AbstractService
{
    public function __construct(ComunganteRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getFirst(int $userId): ?Model
    {
        return $this->repository->loadModel()->where('id_usuario', $userId)->orderBy('created_at', 'desc')->first();
    }

    public function updateByIdAndUser(array $data, int $registroId, int $userId): ?Model
    {
        $comungante = $this->repository->loadModel()->where('id', $registroId)->where('id_usuario', $userId)->first();

        if (!$comungante) {
            return null;
        }

        $comungante->id_usuario = $userId;
        $comungante->quantidade = $data['quantidade'];
        //$comungante->created_at = Carbon::parse($data['created_at'])->setTimezone('America/Sao_Paulo');
        $comungante->save();

        return $comungante;
    }
}