<?php
include 'inc_titulo.php';
include 'inc_menu.php';
?>

<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-12">
            <h2> Total de votos </h2>
        </div>
      
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>                       
                        <th>Código</th>                       
                        <th>Nº Votos</th>                       
                        <th>Nome</th>
                        <th>Genero</th>
                        <th>Foto</th>
                                                
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'inc_conecta.php';

// variável contendo comando para recuperar os registros cadastrados no banco de dados
                    $sql = "select count(votos.cod_filmes) as Nvotos, filmes.id as idC, filmes.nome, filmes.genero "
                           ."FROM votos INNER JOIN filmes on votos.cod_filmes= filmes.id"
                           ." group by cod_filmes order by Nvotos DESC ";
                   
                    // executa a instrução SQL
                    $result = $conn->query($sql);

                                   
                    // num_rows: indica o número de registros obtidos
                    if ($result->num_rows > 0) {

                        // obtém o número de registros selecionados
                                                
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            
                            $idC = $row['idC'];
                            $Nvotos = $row['Nvotos'];
                            $nome = $row['nome'];
                            $clube = $row['genero'];
                            
                            echo "<tr><td class='text-center'> $idC </td>";
                            echo "<td>" . $row['Nvotos'] . "</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['genero'] . "</td>";                          
                            echo "<td> <img src='figuras/$idC.jpg' style='width: 200px; height: 150px'> </td>";
                   
                        }
                    } else {
                        echo "Não há filmes cadastrados";
                    }
            
                    $conn->close()
                    ?>            
                </tbody>
            </table>
        </div>        
    </div>         
</div> 

<?php
include 'inc_rodape.php';
