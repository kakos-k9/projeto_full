<?php

$idAutor = $_POST['idAutor'];

require_once 'Classes/Delecao.php';

$apaga = new Delecao();

if($apaga->apagarLivroAutor($idAutor) && $resultado = $apaga->apagarAutor($idAutor)){
    echo "<script>location.href='index.php';</script>";
} else{
    echo "Deu ruim.";
}