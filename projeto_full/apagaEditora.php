<?php

$idEditora = $_POST['idEditora'];

require_once 'Classes/Delecao.php';

$apaga = new Delecao();

if($apaga->apagarEditora($idEditora)){
    echo "<script>location.href='index.php';</script>";
} else{
    echo "Deu ruim.";
}