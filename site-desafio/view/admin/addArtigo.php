<?php

//Adicionar na tela o botão de "voltar"
require_once("../../src/config.php");
require_once("../../templates/header.php");
include '../../src/Artigo.php';
require_once("../../src/redireciona.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $artigo = new Artigo($mysql);
  $artigo->adicionar($_POST['tema'], $_POST['titulo'], $_POST['conteudo']);

  redireciona('/site-desafio/view/admin/index.php');
}

?>

<div id="container">
  <h1>Adicionar Artigo</h1></br> </br>

  <form class="row col-md-6 offset-md-3 needs-validation" action="addArtigo.php" method="post" novalidate>

    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">Digite um tema...</label>
      <input type="text" class="form-control" id="tema" name="tema" placeholder="tema exemplo" required>
      <div class="valid-feedback">
        Bom!
      </div>
    </div>

    <div class="col-md-4">
      <label for="validationCustom02" class="form-label">Digite um titulo...</label>
      <input type="text" class="form-control" id="titulo" name="titulo"  placeholder="titulo exemplo" required>
      <div class="valid-feedback">
        Bom!
      </div>
    </div>

    <div class="col-md-4">
      <div class="mb-3">
        <label for="validationTextarea" class="form-label">Digite o conteudo...</label>
        <textarea class="form-control is-invalid" id="conteudo" name="conteudo" placeholder="Required example textarea" required></textarea>

        <div class="invalid-feedback">
          Por favor, digite uma mensagem na area de texto.
        </div>
      </div>
    </div>

    <div class="col-12">
      <button class="btn btn-primary" type="submit">Criar Artigo</button>
      <a class="btn btn-secondary" href="index.php">Voltar</a>
    </div>
  </form>

</div>



<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>


<?php
require_once("../../templates/footer.php");
?>