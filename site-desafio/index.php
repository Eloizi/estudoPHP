<?php 
require_once("header.php");
require_once("config.php");
require_once("Artigo.php");

   $artigo = new Artigo($mysql);
    $artigos = $artigo->exibirTodos();

?>

<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Title do artigo</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue a leitura...</a></p>
    </div>
  </div>

<!-- parte do conteudo principal -->
<section class="content">
        <div class="container-fluid">
            <div class="row">
    <?php foreach($artigos as $artigo) : ?>
       
    <div class="col-md-6">
        
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary"><?php echo $artigo['tema']; ?></strong>
          <h3 class="mb-0"><?php echo $artigo['titulo']; ?></h3>
          <div class="mb-1 text-muted"><?php echo $artigo['data']; ?></div>
          <p class="card-text mb-auto"><?php echo nl2br($artigo['conteudo']); ?></p>
          <a href="artigo.php?id=<?php echo $artigo['id']; ?>" class="stretched-link">Continue a leitura</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

        </div>
      </div>
      </div>
     
      <?php endforeach ?>
      </div>

</div>
</section>
      

<!-- Small boxes (Stat box)

<div class="row">

  <div class="col-lg-3 col-6"> -->


  
</main>


<?php 
require_once("footer.php");
?>