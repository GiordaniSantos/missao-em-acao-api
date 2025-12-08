<?php 
namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserService extends AbstractService
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Busca e atualiza um usuário pelo ID.
     *
     * @param array $data Dados validados para atualização.
     * @param int $userId ID do usuário a ser atualizado.
     * @return Model|null Retorna o Model User atualizado ou null se não encontrado.
     */
    public function updateById(array $data, int $userId): ?Model
    {
        // 1. Busca o modelo (lógica delegada ao repositório/model)
        // Usamos find() do AbstractService ou find() do Eloquent no Model
        $user = $this->repository->find($userId); 

        if (!$user) {
            return null; // Não encontrou o recurso para atualizar
        }

        // 2. Aplica as mudanças com lógica condicional
        
        // Atualiza a senha se estiver presente nos dados
        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        
        // Atualiza o email se estiver presente E for diferente do atual
        if (isset($data['email']) && $data['email'] != $user->email) {
             // Nota: A validação de unicidade deve ocorrer no FormRequest/validate()
            $user->email = $data['email'];
        }
        
        $user->name = $data['name'];

        $user->save();

        return $user;
    }
}