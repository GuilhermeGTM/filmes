

<?php
include 'inc_titulopg.php';
include 'inc_menupg.php';

include 'inc_conecta.php';

// variável contendo comando para recuperar os registros cadastrados no banco de dados
$sql = "select votos.id, count(votos.cod_filmes) as Nvotos, filmes.nome as filme "
        . "FROM votos INNER JOIN filmes on votos.cod_filmes= filmes.id group by cod_filmes";
// executa a instrução SQL
$result = $conn->query($sql);

// num_rows: indica o número de registros obtidos
if ($result->num_rows == 0) {
    echo "Não há filmes cadastrados";
}
$conn->close();
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = new google.visualization.DataTable();
        
        
        data.addColumn('string', 'filme');
        data.addColumn('number', 'Nvotos');
              
        <?php while ($row = $result->fetch_assoc()) { ?>        
           data.addRows([['<?= $row["filme"] ?>', <?= $row["Nvotos"] ?>]]);     
        <?php } ?>
            
        var options = {
            title: 'Resultado Parcial'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-12">
            <h2> Acompanhe o Gráfico </h2>
        </div>
        <div class="col-sm-12">
            <div id="piechart" style="width: 900px; height: 500px;"></div>
        </div>
    </div>        
</div>         

<?php
include 'inc_rodape.php';
