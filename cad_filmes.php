<?php
include 'inc_titulo.php';
include 'inc_menu.php';
?>

<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-10">
            <h2> Cadastro de Filmes </h2>
        </div>
        <div class="col-sm-2">
            <h2> <a href="inc_filmes.php" class="btn btn-info btn-block" role="button"> Novo </a> </h2>
        </div>
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th> Nome do filme </th>
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
                            $genero = $row['genero'];
                            
                            
                            echo "<tr><td class='text-center'> $id </td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['genero'] . "</td>";
                            echo "<td> <img src='figuras/$id.jpg' style='width: 200px; height: 150px'> </td>";
                            echo "<td><a href='exc_filmes.php?id=$id' onclick='return confirm(\"Confirma Exclusão de $nome?\")' class='btn btn-warning' role='button'> Excluir </a>
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

<?php
include 'inc_rodape.php';
