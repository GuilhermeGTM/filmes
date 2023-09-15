<?php
session_start();
$mensagem = "";

// verifica se existe a variavel $_POST["email"]
// se existe: o formulario foi preenchido
if (isset($_POST["email"])){
   
    //obtem os campos preenchidos do formulario
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    // inclui o codigo de conexao com o BD
    include "inc_conecta.php";
    
    
    // consulta verificar se e-mail e senha estão cadastrados
    $sql = "SELECT * FROM usuarios where email='$email' and senha=md5('$senha') ";
    // executa o comando SQL
    $result = $conn->query($sql);

    // se encontrou 1 registro
if ($result->num_rows == 1) {
    
    // recupera a linha obtida da consulta SQL
    $row = $result->fetch_assoc();
    
    //define as variaveis de sessao
    $_SESSION["usuario"] = $row["nome"];
    $_SESSION["logado"] = 1;
    
    // carrega a página principal da área restrita
    header("location: index.php");
    
    
} else {
    $mensagem = "Login/Senha incorretos";
}
$conn->close();
    
    
    
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Top Filmes - Área Acesso Restrito</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/login.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Acesso Restrito</h2>
        <label for="inputEmail" class="sr-only">E-mail</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mail de Acesso" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>
        <h4 class="text-center text-danger"> <?= $mensagem ?> </h4>
    </div> <!-- /container -->
    <div class="col-sm-5"></div>
    <div class="col-sm-2">
         <h2> <a href="pagina_comercial.php" class="btn btn-info btn-block" role="button"> Pagina Comercial </a> </h2>
        </div>
     
  </body>
</html>
