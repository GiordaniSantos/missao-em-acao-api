<?php 
namespace App\Services;

use App\Interfaces\ServiceInterface;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AbstractService implements ServiceInterface
{
    protected AbstractRepository $repository;

    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(string $orderBy = 'created_at', string $orderDirection = 'desc'): Collection
    {
        return $this->repository->all($orderBy, $orderDirection);
    }

    public function getAllByUserId(int $userId): Collection
    {
        return $this->repository->loadModel()->where('id_usuario', $userId)->orderBy('created_at', 'desc')->take(15)->get();
    }

    public function create(array $attributes): Model
    {
        return $this->repository->create($attributes);
    }

    public function update(Model $model, array $attributes): bool
    {
        return $this->repository->update($model, $attributes);
    }

    public function updateByIdAndUser(array $data, int $registroId, int $userId): ?Model
    {
        $registro = $this->repository->loadModel()->where('id', $registroId)->where('id_usuario', $userId)->first();

        if (!$registro) {
            return null;
        }

        $registro->id_usuario = $userId;
        $registro->nome = $data['nome'];
        $registro->created_at = Carbon::parse($data['created_at'])->setTimezone('America/Sao_Paulo');

        $registro->save();

        return $registro;
    }

    public function find(int $id): ?Model
    {
        return $this->repository->find($id);
    }

    public function findByIdAndUser(int $crenteId, int $userId): ?Model
    {
        return $this->repository->loadModel()->where('id', $crenteId)->where('id_usuario', $userId)->first();
    }

    public function delete(Model $model): bool
    {
        return $this->repository->delete($model);
    }

    public function deleteByIdAndUserId(int $id, int $userId): bool
    {
        $registro = $this->repository->loadModel()->where('id', $id)->where('id_usuario', $userId)->first();

        if (!$registro) {
            return false;
        }

        $registro->delete();

        return true;
    }
}