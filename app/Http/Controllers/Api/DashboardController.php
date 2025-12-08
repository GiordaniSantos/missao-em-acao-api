<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    protected DashboardService $service;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    /**
     * Exibe os dados mensais para o dashboard.
     */
    public function index(Request $request)
    {
        $id_usuario = (int) $request->input('id_usuario');
        $mes = $request->input('mes', date('m'));
        $ano = $request->input('ano', date('Y'));

        $results = $this->service->getMonthlyData($id_usuario, $mes, $ano);

        return response()->json($results, 200);  
    }

    /**
     * Exibe o relatório anual.
     */
    public function relatorioAnual(Request $request)
    {
        $id_usuario = (int) $request->input('id_usuario');
        $ano = $request->input('ano', date('Y'));

        $results = $this->service->getAnnualReportData($id_usuario, $ano);

        return response()->json($results, 200);  
    }
}