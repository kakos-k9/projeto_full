<?php

$idLivro = $_POST['idLivro'];

require_once 'Classes/Delecao.php';

$apaga = new Delecao();

$apaga->apagarLivroEditora_2($idLivro);

if($apaga->apagarLivro($idLivro)){
    echo "<script>location.href='index.php';</script>";
} else{
    echo "Deu ruim.";
}