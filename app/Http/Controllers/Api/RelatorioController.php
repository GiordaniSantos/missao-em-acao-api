<?php

namespace App\Http\Controllers\Api;

use App\Services\DashboardService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Exports\RelatorioPastoralExport;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioController extends Controller
{
    protected DashboardService $service;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function exportarPdf(Request $request)
    {
        $usuarioLogado = Auth::user();
        $id_usuario = (int) $request->input('id_usuario');
        $mes = $request->input('mes');
        $ano = $request->input('ano', date('Y'));

        $results = $mes ? $this->service->getMonthlyData($id_usuario, $mes, $ano) : $this->service->getAnnualReportData($id_usuario, $ano);

        $html = view($mes ? 'pdf.relatorio-mensal' : 'pdf.relatorio-anual', ['results' => $results, 'mes' => $mes, 'ano' => $ano, 'usuario' => $usuarioLogado])->render();
        $pdf =  Pdf::loadHTML($html)->setPaper('a4', 'landscape')->setOption('isRemoteEnabled', true);
        return $pdf->stream();
    }

    
    public function exportarExcel(Request $request)
    {
        $usuarioLogado = Auth::user();
        $id_usuario = (int) $request->input('id_usuario');
        $mes = $request->input('mes');
        $ano = $request->input('ano', date('Y'));

        $results = $mes 
            ? $this->service->getMonthlyData($id_usuario, $mes, $ano) 
            : $this->service->getAnnualReportData($id_usuario, $ano);

        if ($results instanceof \Illuminate\Support\Collection) {
            $results = $results->toArray();
        }

        $nomeArquivo = 'Relatorio_Pastoral_' . ($mes ? 'Mensal_' . $mes . '_' . $ano : 'Anual_' . $ano);
        $periodoFormatado = $mes ? $mes . '/' . $ano : 'Ano ' . $ano;
        $nomeUsuario = $usuarioLogado->name ?? 'N/A';
        
        return Excel::download(
            new RelatorioPastoralExport($results, $periodoFormatado, $nomeUsuario),
            $nomeArquivo . '.xlsx'
        );
    }
}
