<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;

class RelatorioPastoralExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
    protected array $data;
    protected string $periodo;
    protected string $nomeUsuario;

    public function __construct(array $data, string $periodo, string $nomeUsuario)
    {
        $this->data = $data;
        $this->periodo = $periodo;
        $this->nomeUsuario = $nomeUsuario;
    }

    

    /**
    * @return array
    */
    public function array(): array
    {
        $exportData = [];
        
        $exportData[] = ['RELATÓRIO DE ATIVIDADES PASTORAIS'];
        $exportData[] = ['Período:', $this->periodo];
        $exportData[] = ['Nome:', $this->nomeUsuario];
        $exportData[] = [];

        $exportData[] = ['1. MINISTRAÇÃO'];
        $exportData[] = ['Tipo de Atividade', 'Quantidade'];
        $exportData[] = ['Estudos Bíblicos', (string)$this->data['estudosBiblicos'] ?? 0];
        $exportData[] = ['Estudos', (string)$this->data['estudos'] ?? 0];
        $exportData[] = ['Sermões Ministrados', (string)$this->data['sermoes'] ?? 0];
        $exportData[] = ['Discipulados', (string)$this->data['discipulados'] ?? 0];
        $exportData[] = ['Reuniões de Oração', (string)$this->data['reunioesOracao'] ?? 0];
        $exportData[] = ['Aconselhamentos Biblicos', (string)$this->data['aconselhamentosBiblicos'] ?? 0];
        $exportData[] = [];

        $exportData[] = ['2. FREQUÊNCIA'];
        $exportData[] = ['Tipo da Frequência', 'Quantidade'];
        
        if (isset($this->data['membresias']) && is_iterable($this->data['membresias'])) {
            foreach ($this->data['membresias'] as $membresia) {
                $exportData[] = [$membresia->nome ?? 'N/A', $membresia->quantidade ?? 0]; 
            }
        }

        if(isset($this->data['membresias']) && !is_iterable($this->data['membresias'])){
            $exportData[] = ['Média de Membros aos Domingos', (string)$this->data['membresias'] ?? 0];
        }
        
        if(isset($this->data['comungante'])){
            $exportData[] = ['Membros Comungantes Totais', (string)$this->data['comungante'] ?? 0];
        }
        if(isset($this->data['naoComungante'])){
            $exportData[] = ['Membros Não Comungantes Totais', (string)$this->data['naoComungante'] ?? 0];
        }
        $exportData[] = [];
        
        $exportData[] = ['3. ATO PASTORAL E LITÚRGICO'];
        $exportData[] = ['Cerimônia', 'Quantidade'];
        $exportData[] = ['Batismos Infantis', (string)$this->data['batismosInfantis'] ?? 0];
        $exportData[] = ['Benções Nupciais / Casamentos', (string)$this->data['bencoesNupciais'] ?? 0];
        $exportData[] = ['Santas Ceias', (string)$this->data['santasCeias'] ?? 0];
        $exportData[] = ['Batismos e Profissões de Fé', (string)$this->data['batismosProfissoes'] ?? 0];
        $exportData[] = [];

        $exportData[] = ['4. VISITAÇÃO E CUIDADO'];
        $exportData[] = ['Tipo de Visita', 'Total de Visitas'];
        $exportData[] = ['Visitas aos Crentes (Geral)', (string)$this->data['crentes'] ?? 0];
        $exportData[] = ['Visitas aos Não Crentes',(string)$this->data['incredulos'] ?? 0];
        $exportData[] = ['Visitas aos Enfermos', (string)$this->data['enfermos'] ?? 0];
        $exportData[] = ['Visitas aos Hospitais', (string)$this->data['hospitais'] ?? 0];
        $exportData[] = ['Visitas aos Presídios', (string)$this->data['presidios'] ?? 0];
        $exportData[] = ['Visitas às Escolas', (string)$this->data['escolas'] ?? 0];

        return $exportData;
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return []; 
    }

    public function styles($sheet)
    {
        $greenBackground = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => 'FF015b41'],
            ],
            'font' => [
                'color' => ['argb' => 'FFFFFFFF'],
                'bold' => true,
            ],
        ];

        $sheet->getStyle('A1')->applyFromArray($greenBackground);

        //$sheet->getStyle('A4')->applyFromArray($greenBackground);

        //$sheet->getStyle('A12')->applyFromArray($greenBackground);

        //$sheet->getStyle('A16')->applyFromArray($greenBackground);

        //$sheet->getStyle('A22')->applyFromArray($greenBackground);

        //$sheet->getStyle('A31')->applyFromArray($greenBackground);
        
        $sheet->mergeCells('A1:B1');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   
        $headerBackground = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => 'FFEBEBEB'],
            ],
            'font' => [
                'bold' => true,
            ],
        ];
        
        $sheet->getStyle('A2:B2')->applyFromArray($headerBackground);
        $sheet->getStyle('A3:B3')->applyFromArray($headerBackground);
    }
}