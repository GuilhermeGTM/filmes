<?php
include 'inc_titulo.php';
include 'inc_menu.php';
?>

<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-12">
            <h2> Cadastro de Filmes  </h2>
        </div>

        <form role="form" method="post" action="inc_filmes2.php" enctype="multipart/form-data">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="nome">Nome da Filme:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
            </div>

            <div class="col-sm-6">    
                <div class="form-group">
                    <label for="genero">Genero:</label>
                    <input type="text" class="form-control" id="genero" name="genero" required>
                </div>
            </div>

            
            <div class="col-sm-12">    
                <div class="form-group">
                    <label for="imagem">Foto do Filme: </label>
                    <input type="file" class="form-control" id="imagem" name="imagem" required>
                </div>
            </div>      

            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="submit" class="btn btn-warning">Limpar</button>   
            </div>
        </form>        
        <?php
        include 'inc_rodape.php';
        