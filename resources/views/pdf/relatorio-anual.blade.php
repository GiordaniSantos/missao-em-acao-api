<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relatório Pastoral Mensal</title>
        <link rel="stylesheet" href="estilo_relatorio.css">
    </head>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            width: 100%;
        }

        .header {
            background-color: #015b41;
            color: white;
            padding: 20px 30px;
            border-bottom: 5px solid #00796b;
            border-radius: 12px;
        }

        .header-title-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .header-logo {
            width: 250px;
            height: auto;
            vertical-align: middle;
            margin-top: -35px;
            margin-bottom: 5px;
        }

        .header h1 {
            margin: 0;
            font-size: 24pt;
            font-weight: 300;
            line-height: 1.2;
        }

        .meta-info {
            font-size: 10pt;
            display: flex;
            justify-content: space-around;
            padding-top: 5px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }

        .meta-info p {
            margin: 0;
        }

        .meta-info {
            font-size: 10pt;
            display: flex;
            justify-content: space-around;
            padding-top: 5px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }

        .meta-info p {
            margin: 0;
        }

        main {
            padding: 30px;
        }

        .group-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px dashed #ccc;
            page-break-inside: avoid;
        }

        .group-section h2 {
            color: #015b41;
            border-left: 5px solid #00796b;
            padding-left: 10px;
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 18pt;
        }

        .section-description {
            font-style: italic;
            color: #666;
            margin: 0 0 15px 0;
            font-size: 10pt;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 10pt;
        }

        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            text-align: left;
        }

        .data-table th {
            background-color: #f5f5f5;
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 9pt;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .note-row {
            background-color: #e0f2f1 !important;
            font-size: 10pt;
            font-style: normal;
        }

        .note-row strong {
            color: #015b41;
        }

        .footer {
            text-align: center;
            padding: 20px 30px;
            border-top: 1px solid #eee;
            font-size: 9pt;
            color: #777;
            margin-top: 30px;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
    <body>
        <section class="text-center" style="text-align: center;">
            <img src="img/logo-color.png" alt="Logo da Igreja/Instituição" class="header-logo">
        </section>
        <header class="header">
            <div class="header-title-container">
                <h1>Relatório de Atividades Anual</h1>
            </div>
            <div class="meta-info">
                <p><strong>Ano:</strong> {{$ano}}</p>
                @if ($usuario)
                    <p><strong>Nome:</strong> {{ $usuario->name }}</p>
                @endif
            </div>
        </header>

        <main>
            <section class="group-section ministration">
                <h2>1. Ministração</h2>
                <p class="section-description">Registro das atividades de ensino, pregação e aprofundamento bíblico.</p>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 80%;">Tipo de Atividade</th>
                            <th style="width: 20%;">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Estudos Bíblicos</td>
                            <td>{{ $results['estudosBiblicos'] }}</td>
                        </tr>
                        <tr>
                            <td>Estudos</td>
                            <td>{{ $results['estudos'] }}</td>
                        </tr>
                        <tr>
                            <td>Sermões Ministrados</td>
                            <td>{{ $results['sermoes'] }}</td>
                        </tr>
                        <tr>
                            <td>Discipulados</td>
                            <td>{{ $results['discipulados'] }}</td>
                        </tr>
                        <tr>
                            <td>Reuniões de Oração</td>
                            <td>{{ $results['reunioesOracao'] }}</td>
                        </tr>
                        <tr>
                            <td>Aconselhamentos Biblicos</td>
                            <td>{{ $results['aconselhamentosBiblicos'] }}</td>
                        </tr>
                        <!--<tr>
                            <td colspan="3" class="note-row"><strong>Observações:</strong> [Espaço para detalhes adicionais sobre a ministração, ex: tema central do mês]</td>
                        </tr>-->
                    </tbody>
                </table>
            </section>

            <section class="group-section ministration">
                <h2>2. Frequência</h2>
                <p class="section-description">Média anual da frequência de membros aos domingos.</p>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 80%;">Tipo da Frequência</th>
                            <th style="width: 20%;">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Média de Membros aos Domingos</td>
                            <td>{{ $results['membresias'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="group-section pastoral-act">
                <h2>3. Ato Pastoral e Litúrgico</h2>
                <p class="section-description">Registro de cerimônias e sacramentos/ordenanças realizados.</p>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 80%;">Cerimônia</th>
                            <th style="width: 20%;">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Batismos Infantis</td>
                            <td>{{ $results['batismosInfantis'] }}</td>
                        </tr>
                        <tr>
                            <td>Benções Nupciais / Casamentos</td>
                            <td>{{ $results['bencoesNupciais'] }}</td>
                        </tr>
                        <tr>
                            <td>Santas Ceias</td>
                            <td>{{ $results['santasCeias'] }}</td>
                        </tr>
                        <tr>
                            <td>Batismos e Profissões de Fé</td>
                            <td>{{ $results['batismosProfissoes'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="group-section visitation">
                <h2>4. Visitação e Cuidado</h2>
                <p class="section-description">Registro das visitas realizadas com foco no cuidado e acompanhamento dos membros.</p>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 80%;">Tipo de Visita</th>
                            <th style="width: 20%;">Total de Visitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Visitas aos Crentes (Geral)</td>
                            <td>{{ $results['crentes'] }}</td>
                        </tr>
                        <tr>
                            <td>Visitas aos Não Crentes</td>
                            <td>{{ $results['incredulos'] }}</td>
                        </tr>
                        <tr>
                            <td>Visitas aos Enfermos</td>
                            <td>{{ $results['enfermos'] }}</td>
                        </tr>
                        <tr>
                            <td>Visitas aos Hospitais</td>
                            <td>{{ $results['hospitais'] }}</td>
                        </tr>
                        <tr>
                            <td>Visitas aos Presídios</td>
                            <td>{{ $results['presidios'] }}</td>
                        </tr>
                        <tr>
                            <td>Visitas às Escolas</td>
                            <td>{{ $results['escolas'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </section>

        </main>

        <footer class="footer">
            <p>Relatório gerado em: {{date('d/m/Y H:i')}}h</p>
            <!--<p>Assinatura: _________________________</p>-->
        </footer>
    </body>
</html>