<?php

require_once("../../src/config.php");
require_once("../../templates/header.php");
include '../../src/Artigo.php';
require_once("../../src/redireciona.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Artigo($mysql);
    $artigo->remover($_POST['id']);

    redireciona('/site-desafio/view/admin/index.php');
}
?>

<div id="container"></br>
    <h1>Você realmente deseja excluir o post?</h1></br>
    <form method="post" action="excluirArtigo.php">
        <p>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
            <button type="submit" class="btn btn-danger">Excluir</button>
            <a type="button" class="btn btn-secondary" href="index.php">Voltar</a>

        </p>
    </form>

    <?php
    require_once("../../templates/footer.php");
    ?>