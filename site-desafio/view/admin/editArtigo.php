<?php
// adicionar na tela de Editar o botão de "cancelar ou voltar"

require_once("../../src/config.php");
require_once("../../templates/header.php");
include '../../src/Artigo.php';
require '../../src/redireciona.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Artigo($mysql);
    $artigo->editar($_POST['id'], $_POST['tema'], $_POST['titulo'], $_POST['conteudo']);

    redireciona('/site-desafio/view/admin/index.php');
}

$artigo = new Artigo($mysql);
$art = $artigo->encontrarPorId($_GET['id']);



?>


<div id="container">
    <h1>Editar Artigo</h1> </br></br>

    <form class="row col-md-6 offset-md-3 needs-validation" action="editArtigo.php" method="post" novalidate>

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Edite o tema...</label>
            <input type="text" class="form-control" id="tema" name="tema" value="<?php echo $art['tema']; ?>" required>
            <div class="valid-feedback">
                Bom!
            </div>
        </div>

        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Edite o titulo...</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $art['titulo']; ?>" required>
            <div class="valid-feedback">
                Bom!
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="validationTextarea" class="form-label">Edite o conteudo...</label>
                <textarea class="form-control is-invalid" id="conteudo" name="conteudo" required><?php echo $art['conteudo']; ?></textarea>

                <div class="invalid-feedback">
                    Por favor, digite uma mensagem na area de texto.
                </div>
            </div>
        </div>
        <p>
            <input type="hidden" name="id" value="<?php echo $art['id']; ?>" />
        </p>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Editar Artigo</button>
            <a class="btn btn-secondary" href="index.php">Voltar</a>
        </div>
    </form>




</div>
<?php
require_once("../../templates/footer.php");
?>