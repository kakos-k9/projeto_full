<?php

$nomeEditora = $_POST['nomeEditora'];
$localizacao = $_POST['localizacaoEditora'];
$idEditora = $_POST['idEditora'];

require_once 'Classes/Atualizacao.php';

$edita = new Atualizacao();

if($resultado = $edita->editarEditora($nomeEditora, $localizacao, $idEditora)){
    echo "<script>location.href='index.php';</script>";
} else{
    echo "Deu ruim.";
}
