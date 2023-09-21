<?php

$nomeAutor = $_POST['nomeAutor'];
$nacionalidade = $_POST['nacionalidadeAutor'];

require_once 'Classes/Insercao.php';

$insere = new Insercao();

if($resultado = $insere->inserirAutor($nomeAutor, $nacionalidade)){
    echo "Dados inseridos com sucesso.";
} else{
    echo "Deu ruim.";
}

