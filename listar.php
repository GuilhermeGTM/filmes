<?php
include 'inc_titulo.php';
include 'inc_menu.php';
?>

<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-10">
            <h2> Lista de Votos </h2>
        </div>
      
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>                        
                        <th>Nome de quem votou</th>
                        <th>E-mail de quem votou</th>
                        <th>Filme</th>
                        <th>Genero</th>
                        <th>Imagem</th>                                              
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'inc_conecta.php';

// variável contendo comando para recuperar os registros cadastrados no banco de dados
                    $sql = "SELECT votos.nome, votos.email, filmes.id as idC, filmes.nome as filme, filmes.genero  as c_genero "
                           . "FROM votos INNER JOIN filmes on votos.cod_filmes= filmes.id";
                   
                    // executa a instrução SQL
                    $result = $conn->query($sql);

                                   
                    // num_rows: indica o número de registros obtidos
                    if ($result->num_rows > 0) {

                        $total = 0;
                        // obtém o número de registros selecionados
                        $num = $result->num_rows;
                        
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {                           
                             
                            $idC = $row['idC'];
                            $nome = $row['nome'];                          
                            $email = $row['email'];
                            $nomeC = $row['filme'];
                            $c_clube = $row['c_genero'];

                            
                            echo "<tr><td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['filme'] . "</td>";
                            echo "<td>" . $row['c_genero'] . "</td>";                           
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
