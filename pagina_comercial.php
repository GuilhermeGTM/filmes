<?php
include 'inc_titulopg.php';
include 'inc_menupg.php';
include 'inc_conecta.php';

?>


<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-10">
            <h2> Vote no Filme </h2>
        </div>
        <div class="col-sm-2">
            <h2> <a href="inc_grafico.php" class="btn btn-info btn-block" role="button"> Resultado </a> </h2>
        </div>
        <div class="col-sm-12">
            <table class="table table-striped">
                
                <thead>
                    <tr>
                        
                        <th> Nome do Filme </th>
                        <th> Genero </th>
                        <th> Foto </th>
                                               
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'inc_conecta.php';

// variável contendo comando para recuperar os registros cadastrados no banco de dados
                    $sql = "SELECT id, nome, genero FROM filmes ORDER BY id";
// executa a instrução SQL
                    $result = $conn->query($sql);

// num_rows: indica o número de registros obtidos
                    if ($result->num_rows > 0) {
                        
                        $total= 0;
                        //obtem numero de registros selecionados
                        $num = $result-> num_rows;
// output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $nome = $row['nome'];
                            $clube = $row['genero'];
                            
                           
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['genero'] . "</td>";
                            echo "<td> <img src='figuras/$id.jpg' style='width: 200px; height: 200px'> </td>";
                            echo "<td><a href='inc_votos.php?id=$id'  class='btn btn-warning' role='button'> Votar </a>
                          </td></tr>";
                        }
                    } else {
                        echo "Não há Filmes cadastrados";
                    }
                    
                  
                    
                    $conn->close();
                    ?>            
                </tbody>
            </table>
        </div>        
    </div>         
</div> 
</div>
<?php
include 'inc_rodape.php';
