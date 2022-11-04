<?php 

//refatorando o código
class Artigo
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionar(string $tema, string $titulo, string $conteudo): void 
    {   
        date_default_timezone_set('America/Sao_Paulo');

        $data = date('Y-m-d H:i');
        
        $insereArtigo = $this->mysql->prepare('INSERT INTO post (tema, titulo,`data`, conteudo) VALUES (?,?,?,?);');
        $insereArtigo->bind_param('ssss', $tema, $titulo, $data, $conteudo);
        $insereArtigo->execute();
    }

    public function remover(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM post WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }


    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT `id`, `tema`, `titulo`, `data`, `conteudo` FROM `post` ');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);
    
        return $artigos;
    }

    public function encontrarPorId(string $id): array
    {
       $selecionaArtigo =  $this->mysql->prepare("SELECT id, tema, titulo, conteudo FROM post WHERE id = ?");
       $selecionaArtigo->bind_param('s', $id);
       $selecionaArtigo->execute();
       $artigo = $selecionaArtigo->get_result()->fetch_assoc();
       return $artigo;
    
    }



    public function editar(string $id, string $tema, string $titulo, string $conteudo): void
    {
        $editaArtigo = $this->mysql->prepare("UPDATE post SET tema = ?, titulo = ?, conteudo = ? WHERE id = ?");
        $editaArtigo->bind_param('ssss', $tema, $titulo, $conteudo, $id);
        $editaArtigo->execute();

    }

}


?>