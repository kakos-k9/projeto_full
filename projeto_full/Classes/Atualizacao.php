<?php
require_once "conexao.php";

class Atualizacao{
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

    function editarAutor($nomeAutor, $nacionalidadeAutor, $idAutor){
        try{
            $stmt = $this->db->prepare(     
                "UPDATE biblioteca.autores SET nome = :nome, nacionalidade = :nacionalidade WHERE id = :id");

                $stmt->bindParam(':nome', $nomeAutor);
                $stmt->bindParam(':nacionalidade', $nacionalidadeAutor);
                $stmt->bindParam(':id', $idAutor);
            
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return "OK";
                } else {
                    echo "Erro ao editar na tabela autores.";
                }
            } else{
                throw new PDOException ("Erro: Não foi possível executar a edição na tabela autores");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }


    function editarEditora($nomeEditora, $localizacao, $idEditora){
        try{
            $stmt = $this->db->prepare(     
                "UPDATE biblioteca.editoras SET nome = :nome, localizacao = :localizacao WHERE id = :id");

                $stmt->bindParam(':nome', $nomeEditora);
                $stmt->bindParam(':localizacao', $localizacao);
                $stmt->bindParam(':id', $idEditora);
            
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return "OK";
                } else {
                    echo "Erro ao editar na tabela Editoras.";
                }
            } else{
                throw new PDOException ("Erro: Não foi possível executar a edição na tabela Editoras");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }

    function editarLivro($tituloLivro, $ano, $idAutor, $idEditora){
        try{
            $stmt = $this->db->prepare(     
                "UPDATE biblioteca.livros SET titulo = :titulo, ano_de_publicacao = :ano_de_publicacao, id_do_autor = :id_do_autor WHERE id = :id");

                $stmt->bindParam(':titulo', $tituloLivro);
                $stmt->bindParam(':ano_de_publicacao', $ano);
                $stmt->bindParam(':id_do_autor', $idAutor);

                $stmt->bindParam(':id', $idEditora);
            
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return "OK";
                } else {
                    echo "Erro ao editar na tabela Editoras.";
                }
            } else{
                throw new PDOException ("Erro: Não foi possível executar a edição na tabela Editoras");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }

}