<?php

$tituloLivro = $_POST['tituloLivro'];
$anoLivro = $_POST['anoLivro'];
$idAutor = $_POST['idAutor'];
$idLivro = $_POST['idLivro'];

require_once 'Classes/Atualizacao.php';

$edita = new Atualizacao();

if($resultado = $edita->editarLivro($tituloLivro, $anoLivro, $idAutor, $idLivro)){
    echo "<script>location.href='index.php';</script>";
} else{
    echo "Deu ruim.";
}
