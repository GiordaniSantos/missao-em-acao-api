<?php
namespace App\Services;

use App\Models\{Membresia, Crente, Incredulo, Presidio, Enfermo, Hospital, Escola, BatismoInfantil, BatismoProfissao, BencaoNupcial, Comungante, SantaCeia, Estudo, Sermao, EstudoBiblico, Discipulado, NaoComungante, ReuniaoOracao};
use Illuminate\Support\Facades\DB;

class DashboardService
{

    protected array $modelsToCount = [
        'crentes' => Crente::class,
        'incredulos' => Incredulo::class,
        'presidios' => Presidio::class,
        'enfermos' => Enfermo::class,
        'hospitais' => Hospital::class,
        'escolas' => Escola::class,
        'batismosInfantis' => BatismoInfantil::class,
        'batismosProfissoes' => BatismoProfissao::class,
        'bencoesNupciais' => BencaoNupcial::class,
        'santasCeias' => SantaCeia::class,
        'estudos' => Estudo::class,
        'sermoes' => Sermao::class,
        'estudosBiblicos' => EstudoBiblico::class,
        'discipulados' => Discipulado::class,
        'reunioesOracao' => ReuniaoOracao::class,
    ];

    /**
     * Coleta os dados mensais para o dashboard.
     */
    public function getMonthlyData(int $userId, string $mes, string $ano): array
    {
        $results = [];

        // 1. Contagem de Registros
        foreach ($this->modelsToCount as $key => $modelClass) {
            $query = $modelClass::query()->where('id_usuario', $userId)->whereYear('created_at', $ano)->whereMonth('created_at', $mes);
            
            // O modelo Membresia é o único que precisa de lógica diferente no seu exemplo original
            if ($key === 'membresias') {
                $results[$key] = $query->get();
            } else {
                $results[$key] = $query->count();
            }
        }
        
        // 2. Coleta de Dados Específicos (Comungante/NaoComungante)
        $comungante = Comungante::where('id_usuario', $userId)->first('quantidade');
        $results['comungante'] = $comungante ? $comungante->quantidade : 0;

        $naoComungante = NaoComungante::where('id_usuario', $userId)->first('quantidade');
        $results['naoComungante'] = $naoComungante ? $naoComungante->quantidade : 0;
        
        // 3. Membresias (Se tiver um tratamento especial, coloque aqui, mas Membresia é modelToCount)
        $results['membresias'] = Membresia::where('id_usuario', $userId)->whereYear('created_at', $ano)->whereMonth('created_at', $mes)->get();
        
        return $results;
    }

    /**
     * Coleta os dados anuais para o relatório.
     */
    public function getAnnualReportData(int $userId, string $ano): array
    {
        $results = [];

        // 1. Contagem de Registros Anuais
        foreach ($this->modelsToCount as $key => $modelClass) {
            $results[$key] = $modelClass::where('id_usuario', $userId)->whereYear('created_at', $ano)->count();
        }

        // 2. Cálculo da Média de Membresias (Lógica Complexa no Service)
        $membresiasTotal = Membresia::where('id_usuario', $userId)->whereYear('created_at', $ano)->count();
                                    
        $somaQuantidades = Membresia::where('id_usuario', $userId)->whereYear('created_at', $ano)->sum('quantidade');
        
        // Cuidado com divisão por zero:
        $results['membresias'] = ($membresiasTotal != 0) ? intval($somaQuantidades / $membresiasTotal) : 0;

        return $results;
    }
}