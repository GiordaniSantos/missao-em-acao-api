<?php 
namespace App\Services;

use App\Repositories\MembresiaRepository;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MembresiaService extends AbstractService
{
    public function __construct(MembresiaRepository $repository)
    {
        parent::__construct($repository);
    }

    public function updateByIdAndUser(array $data, int $registroId, int $userId): ?Model
    {
        $membresia = $this->repository->loadModel()->where('id', $registroId)->where('id_usuario', $userId)->first();

        if (!$membresia) {
            return null;
        }

        $membresia->id_usuario = $userId;
        $membresia->created_at = Carbon::parse($data['created_at'])->setTimezone('America/Sao_Paulo');
        $membresia->fill($data);
        $membresia->save();

        return $membresia;
    }
}