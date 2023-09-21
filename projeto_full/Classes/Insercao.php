<?php
require_once "conexao.php";

class Insercao{
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

    function inserirAutor($nomeAutor, $nacionalidadeAutor){
        try{
            $stmt = $this->db->prepare(     
                "INSERT INTO biblioteca.autores (nome, nacionalidade)
                VALUES (:nome, :nacionalidade)");

                $stmt->bindParam(':nome', $nomeAutor);
                $stmt->bindParam(':nacionalidade', $nacionalidadeAutor);
            
            if($stmt->execute()){
                if($stmt->rowCount() > 0){
                    return "OK";
                } else {
                    echo "Erro ao inserir na tabela autores.";
                }
            } else{
                throw new PDOException ("Erro: Não foi possível executar a insercão na tabela autores");
            }
        } catch (PDOException $erro){
            //Tratamento de erro 
            echo "Erro: " . $erro->getMessage();
        }
    }
}