<?php
    require '../config.php';
    include '../Artigo.php';
    $artigo = new Artigo($mysql);
    $artigos = $artigo->exibirTodos();
    
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
    
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>
        <div>
            <?php foreach($artigos as $art) : ?>
            <div id="artigo-admin">
                <p><?php echo $art ['titulo']; ?></p>
                <nav>
                    <a class="btn btn-primary" href="./editArtigo.php?id=<?php echo $art['id']; ?>">Editar</a>
                    <a class="btn btn-danger" href="./excluirArtigo.php?id=<?php echo $art['id']; ?>">Excluir</a>
                </nav>
                
            </div>
            <?php endforeach ?>
            
        </div>

        <a class="btn btn-primary" href="addArtigo.php">Adicionar Artigo</a> 
        <a class="btn btn-secondary" href ="../index.php" >Voltar</a>
         

        </div>
</body>

</html>