<?php 

require_once("../src/config.php");
require_once("../src/Artigo.php");
require_once("../templates/header.php");

   $obj_artigo = new Artigo($mysql);
    $artigo = $obj_artigo->encontrarPorId($_GET['id']);

?>

    
        <h1>
           <?php echo $artigo['titulo']; ?>
        </h1>
        <p>
            <?php echo nl2br($artigo['conteudo']); ?>
        </p>
        <div>
            <a class="btn btn-secondary" href ="../index.php">Voltar</a>
       

 
<?php 
require_once("../templates/footer.php");
?>