<?php
require_once "conexao.php";

class Delecao{
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

    function apagarAutor($idAutor){
        try{
            $stmt = $this->db->prepare("DELETE FROM biblioteca.autores WHERE id = :id");

                $stmt->bindParam(':id', $idAutor);
            
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return "OK";
                } else {
                    echo "Erro ao apagar na tabela autores.";
                }
            } else{
                throw new PDOException ("Erro: Não foi possível executar a exclusão na tabela autores");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }

    function apagarEditora($idEditora){
        try{
            $stmt = $this->db->prepare("DELETE FROM biblioteca.editoras WHERE id = :id");

                $stmt->bindParam(':id', $idEditora);
            
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return "OK";
                } else {
                    echo "Erro ao apagar na tabela Editoras.";
                }
            } else{
                throw new PDOException ("Erro: Não foi possível executar a exclusão na tabela editoras");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }

    function apagarLivro($idLivro){
        try{
            $stmt = $this->db->prepare("DELETE FROM biblioteca.livros WHERE id = :id");

            $stmt->bindParam(':id', $idLivro);
            
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return "OK";
                } else {
                    echo "Erro ao apagar na tabela LIVROS.";
                }
            } else{
                throw new PDOException ("Erro: Não foi possível executar a exclusão na tabela livros");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }


    function apagarLivroEditora_2($idLivro){
        try{
            $stmt = $this->db->prepare("DELETE FROM biblioteca.livros_editoras WHERE id_do_livro = :id");

            $stmt->bindParam(':id', $idLivro);
            
            $stmt->execute();
            
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }


    function apagarLivroAutor($idAutor){
        try{
            $stmt = $this->db->prepare(     
                "DELETE FROM biblioteca.livros WHERE id_do_autor = :id");

                $stmt->bindParam(':id', $idAutor);
            
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return "OK";
                } else {
                    echo "Erro ao apagar na tabela livros.";
                }
            } else{
                throw new PDOException ("Erro: Não foi possível executar a exclusão na tabela livros");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }

    function apagarLivroEditora($idLivro){
        try{
            $stmt = $this->db->prepare(     
                "DELETE FROM biblioteca.livros_editora WHERE id_do_autor = :id");

                $stmt->bindParam(':id', $idAutor);
            
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return "OK";
                } else {
                    echo "Erro ao apagar na tabela livros_editora.";
                }
            } else{
                throw new PDOException ("Erro: Não foi possível executar a exclusão na tabela livros_editora");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }
}
