<?php 
namespace App\Services;

use App\Repositories\NaoComunganteRepository;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class NaoComunganteService extends AbstractService
{
    public function __construct(NaoComunganteRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getFirst(int $userId): ?Model
    {
        return $this->repository->loadModel()->where('id_usuario', $userId)->orderBy('created_at', 'desc')->first();
    }

    public function updateByIdAndUser(array $data, int $registroId, int $userId): ?Model
    {
        $naoComungante = $this->repository->loadModel()->where('id', $registroId)->where('id_usuario', $userId)->first();

        if (!$naoComungante) {
            return null;
        }

        $naoComungante->id_usuario = $userId;
        $naoComungante->quantidade = $data['quantidade'];
        //$naoComungante->created_at = Carbon::parse($data['created_at'])->setTimezone('America/Sao_Paulo');
        $naoComungante->save();

        return $naoComungante;
    }
}