<?php

$nomeAutor = $_POST['nomeAutor'];
$nacionalidade = $_POST['nacionalidadeAutor'];
$idAutor = $_POST['idAutor'];

require_once 'Classes/Atualizacao.php';

$edita = new Atualizacao();

if($resultado = $edita->editarAutor($nomeAutor, $nacionalidade, $idAutor)){
    echo "<script>location.href='index.php';</script>";
} else{
    echo "Deu ruim.";
}
