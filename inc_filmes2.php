<?php
include 'inc_titulo.php';
include 'inc_menu.php';
?>

<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-12">
            <h2> Inclusão de Filmes </h2>
<?php
        // obtém os campos do formulário 
        $nome = $_POST["nome"];
        $genero = $_POST["genero"];
        $imagem = $_FILES["imagem"]["name"];
        $imagem_tmp = $_FILES["imagem"]["tmp_name"];
        
        
        // exibe as informações do produto
        echo "<h3> Nome: $nome </h3>";
        echo "<h3> Genero: $genero </h3>";
        echo "<h3> Foto: $imagem </h3>";
        
        include 'inc_conecta.php';

        $sql = "INSERT INTO filmes(nome, genero)
                VALUES ('$nome', '$genero')";

        if ($conn->query($sql) === TRUE) {
            // obtém o id do ultimo registro inserido
            $last_id = $conn->insert_id;
            echo "<h3> Ok! Filme  Corretamente Cadastrado - Código: $last_id </h3>";
            
            //indica o destino e nome da imagem
            $destino = "figuras/" . $last_id . ".jpg";
            
            //copia a imagem do localtemporário para a pasta destino
            move_uploaded_file($imagem_tmp, $destino);
            
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>
        </div>
    </div>
</div>
<?php
include 'inc_rodape.php';