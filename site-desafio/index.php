<?php
require_once("templates/header.php");
require_once("src/config.php");
require_once("src/Artigo.php");

$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();

?>

<!-- Preciso Editar o arquivo Adicionar post de acordo com o formulário!!! -->
<style>
.btn{
  border-radius: none;
  background-color: none;
  font-size: larger;
}

</style>

<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <h1>Blog - desafio</h1>
  </header>

  <ul class="nav justify-content-center">
    <li><a class="btn btn-block" href="index.php">Home</a></li>
    <li><a class="btn btn-block" href="view/admin/index.php">Admin</a></li>
  </ul>
</div>



<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-12 px-0">
      <h1 class="display-4 fst-italic">A importância da gestão do tempo</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
    </div>
  </div>
  <!-- parte do conteudo principal -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <?php foreach ($artigos as $artigo) : ?>

          <div class="col-md-6">

            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary"><?php echo $artigo['tema']; ?></strong>
                <h3 class="mb-0"><?php echo $artigo['titulo']; ?></h3>
                <div class="mb-1 text-muted"><?php echo $artigo['data']; ?></div>
                <p class="card-text mb-auto" style="max-width: 40ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; "><?php echo nl2br($artigo['conteudo']); ?></p>
                <!--  -->
                <a href="view/artigo.php?id=<?php echo $artigo['id']; ?>" class="stretched-link">Continue a leitura</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <!-- <svg class="bd-placeholder-img" href= "" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">aaaaa</text></svg> -->
                <img class="bd-placeholder-img" width="200" height="250" src="img/b2.jpg" alt="">
              </div>
            </div>
          </div>

        <?php endforeach ?>
      </div>

    </div>
  </section>


</main>


<?php
require_once("templates/footer.php");
?>