<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ServiceInterface
{
    public function getAll(string $orderBy, string $orderDirection): Collection;
    public function getAllByUserId(int $userId): Collection;
    public function create(array $attributes): Model|null;
    public function delete(Model $model): bool;
    public function deleteByIdAndUserId(int $id, int $userId): bool;
    public function find(int $id): Model|null;
    public function findByIdAndUser(int $id, int $idUsuario): ?Model;
    public function update(Model $model, array $attributes): bool;
    public function updateByIdAndUser(array $data, int $registroId, int $userId): ?Model
}