<?php
include 'inc_titulopg.php';
include 'inc_menupg.php';
?>


<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-9">
            <h2> Incluir Voto </h2>
        </div>
        <!-- enctype="multipart/form-data" permite ao form enviar arquivos -->
 
        <form role="form" method="post" action="inc_votos2.php" enctype="multipart/form-data">
 
                                 
            <div class="col-sm-1"></div> 
 
 
            <div class="col-sm-11">  
 
                <div class="col-sm-8">
 
                    <div class="form-group">
                        
                        <?php 
                        
                        $idfilme = $_GET['id'];
                   
                       
                        echo "<input style='display:none;' type='radio' value='$idfilme' name='idfilme' id='idfilme' checked";
                        
                        ?>
 
                        <label for="descricao">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
 
                    </div>
                </div>
                <div class="col-sm-8">    
 
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
 
                    </div>
 
                </div>
 
            
 
                <div class="col-sm-12">    
 
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Enviar">
                        <input type="reset" class="btn btn-warning" value="Limpar">
 
                    </div>    
 
                </div>
        </form>
    </div>
 
</div> 
 
</div>
</div>
<?php
include 'inc_rodape.php';