<?php
require_once "conexao.php";

class Selecao {

    private $db;

    public function __construct() {
        try {
            //Conexão com o banco de dados
            $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            //Tratamento de erro
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        }
    }

    function selecionarLivros(){
        try{
            $stmt = $this->db->prepare(     
                "SELECT
                    id,
                    titulo,
                    ano_de_publicacao,
                    id_do_autor
                    FROM biblioteca.livros");
            
            if($stmt->execute()){
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } else{
                throw new PDOException ("Erro: Não foi possível executar a consulta a tabela livros");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }
    

    function selecionarEditoras(){
        try{
            $stmt = $this->db->prepare(     
                "SELECT
                    id,
                    nome,
                    localizacao
                    FROM biblioteca.editoras");
            
            if($stmt->execute()){
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } else{
                throw new PDOException ("Erro: Não foi possível executar a consulta a tabela editoras");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        } 
    }

    function selecionarAutores(){
        try{
            $stmt = $this->db->prepare(     
                "SELECT
                    id,
                    nome,
                    nacionalidade
                    FROM biblioteca.autores");
            
            if($stmt->execute()){
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } else{
                throw new PDOException ("Erro: Não foi possível executar a consulta a tabela autores");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        } 
    }

    function selecionarTudo(){
        try{
            $stmt = $this->db->prepare(     
                "SELECT
                biblioteca.livros.id AS livro_id,
                biblioteca.livros.titulo AS livro_titulo,
                biblioteca.livros.ano_de_publicacao AS ano_publicacao,
                biblioteca.autores.id AS autor_id,
                biblioteca.autores.nome AS autor_nome,
                biblioteca.autores.nacionalidade AS autor_nacionalidade,
                biblioteca.editoras.id AS editora_id,
                biblioteca.editoras.nome AS editora_nome,
                biblioteca.editoras.localizacao AS editora_localizacao
            FROM
                biblioteca.livros
            INNER JOIN
                biblioteca.autores ON biblioteca.livros.id_do_autor = biblioteca.autores.id
            INNER JOIN
                biblioteca.livros_editoras ON biblioteca.livros.id = biblioteca.livros_editoras.id_do_livro
            INNER JOIN
                biblioteca.editoras ON biblioteca.livros_editoras.id_da_editora = biblioteca.editoras.id
            ORDER BY biblioteca.livros.id
            ");
            
            if($stmt->execute()){
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } else{
                throw new PDOException ("Erro: Não foi possível executar a consulta a tabela autores");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        } 
    }

}