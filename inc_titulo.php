<?php
session_start();

if (isset($_SESSION["logado"])){
$usuario = $_SESSION["usuario"];


}else{
    header("location: login.php");
    
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Top Filmes </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/bootstrap.css">
        <script src="bootstrap/jquery.js"></script>
        <script src="bootstrap/bootstrap.js"></script>
    </head>
    <body>

        <div class="container-fluid">

            <div class="row bg-primary">
                <div class="col-sm-12">
                    <br>
                </div>
                <div class="col-sm-2">
                    <img src="capa/logo.jpg" alt="patro" style="width: 150px; height: 150px">
                </div>
                <div class="col-sm-5">
                    <h1> Top Filmes</h1>
                    <h4> Controle de Cadastro de Filmes </h4>
                </div>
                <div class="col-sm-4">
                    <h1>&nbsp;</h1>
                    <h4> Usuário: <?= $usuario ?> - <a href="logout.php" class="btn btn-warning"> Sair </a></h4>
                </div>
                <div class="col-sm-12">
                    <br>
                </div>
            </div>
