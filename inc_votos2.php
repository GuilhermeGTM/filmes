<?php
include 'inc_titulopg.php';
include 'inc_menupg.php';
?>


<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-12">
           <h2> Situação do Voto </h2>
            <?php
            $nome = $_POST["nome"];
            $email= $_POST["email"];                  
            $idC= $_POST['idfilme'];  
            
            include 'inc_conecta.php';
             
             
            $sql = "SELECT * FROM votos where email='$email'";
             
               $result = $conn->query($sql);
             
             if($result->num_rows > 0) {
               
              echo '<h3>Erro email já cadastrado</h3>';
                         
                         
                  
             } else {
 
            $sql = "INSERT INTO votos (cod_filmes, nome, email)
                 VALUES ('$idC', '$nome', '$email')";
                
 
            echo "<p> Nome: $nome </p>";
            echo "<p> Email: $email </p>";
           
           
            // executa a instrução sql acima
            if ($conn->query($sql) === TRUE) {
                // obtém o id do registro inserido
                $last_id = $conn->insert_id;
                echo "<h3> Voto Comfirmado, Obrigado Pela Colaboração... </h3>";
                 
            
                 
                          
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }
 
             }
             
            $conn->close();
             
              
            ?>
        </div>
    </div>
</div>
<?php
include 'inc_rodape.php';