<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/voluntarios.php';

    $voluntarios = listarVoluntarios();

    $dadosGrafico = [["Voluntário", "Telefone"]]; 
    foreach ($voluntarios as $voluntario) {
        $nome = $voluntario['nome'];
        $telefone = $voluntario['telefone'];

        $tamanhoTelefone = $telefone ? strlen($telefone) : 0;
        $dadosGrafico[] = [$nome, $tamanhoTelefone];
    }
    $dadosGraficoJson = json_encode($dadosGrafico);
?>

<main class="container">
    <div class="container mt-5">
        <h2>Dashboard - Voluntários</h2>

        <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Array de dados enviado do PHP para o JavaScript
            var data = google.visualization.arrayToDataTable(<?php echo $dadosGraficoJson; ?>);

            // Opções de customização do gráfico
            var options = {
                title: 'Voluntários e Dados',
                hAxis: {title: 'Voluntários', titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
                chartArea: {width: '70%', height: '70%'}
            };

            // Renderizar o gráfico na div com id 'chart_div'
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</main>

<?php require_once 'rodape.php'; ?>
