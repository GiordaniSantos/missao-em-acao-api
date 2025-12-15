<?php

namespace App\Http\Controllers\Api;

use App\Services\DashboardService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $mes = $request->input('mes', date('m'));
        $ano = $request->input('ano', date('Y'));

        $results = $this->service->getMonthlyData($id_usuario, $mes, $ano);

        $html = view('pdf.index', ['results' => $results, 'mes' => $mes, 'ano' => $ano, 'usuario' => $usuarioLogado])->render();
        $pdf =  Pdf::loadHTML($html)->setPaper('a4', 'landscape')->setOption('isRemoteEnabled', true);
        return $pdf->stream();
    }

    

}
