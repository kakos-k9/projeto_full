<?php
require_once "Classes/Selecao.php";

$busca = new Selecao();

$resultado = $busca->selecionarLivros();
foreach ($resultado as $listar) {
    $id[] = $listar['id'];
    $titulo[] = $listar['titulo'];
    $anoPublicacao[] = $listar['ano_de_publicacao'];
    $idAutor[] = $listar['id_do_autor'];
}

$resultado = $busca->selecionarEditoras();
foreach ($resultado as $listar) {
    $id_editora[] = $listar['id'];
    $nome_editora[] = $listar['nome'];
    $localizacao[] = $listar['localizacao'];
}

$resultado = $busca->selecionarAutores();
foreach ($resultado as $listar) {
    $id_autor[] = $listar['id'];
    $nome_autor[] = $listar['nome'];
    $nacionalidade[] = $listar['nacionalidade'];
}

$resultado = $busca->selecionarTudo();
foreach ($resultado as $listar) {
    $idLivroGeral[] = $listar['livro_id'];
    $tituloLivroGeral[] = $listar['livro_titulo'];
    $anoPublicacaoLivroGeral[] = $listar['ano_publicacao'];
    $idAutorGeral[] = $listar['autor_id'];
    $nomeAutorGeral[] = $listar['autor_nome'];
    $nacionalidadeAutorGeral[] = $listar['autor_nacionalidade'];
    $idEditoraGeral[] = $listar['editora_id'];
    $nomeEditoraGeral[] = $listar['editora_nome'];
    $localizacaoEditoraGeral[] = $listar['editora_localizacao'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .center {
            text-align: center;
        }

        table {
            border: 1px solid;
        }

        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <section class="m-5">
        <table class="table table-bordered table-hover">
            <thead>
                <h2>Tabela de Livros</h2>
                <tr>
                    <th class="center">ID</th>
                    <th class="center">Título</th>
                    <th class="center">Ano de Publicação</th>
                    <th class="center">ID do Autor</th>
                    <th class="center">ACAO</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($id); $i++) { ?>
                    <tr>
                        <td class="center">
                            <?php echo $id[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $titulo[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $anoPublicacao[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $idAutor[$i]; ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editaLivro<?php echo $id[$i]; ?>">EDITA LIVROR</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagaLivro<?php echo $id[$i]; ?>">Apagar</button>
                        </td>
                    </tr>
                    
                    <!-- Modal de Editar -->
                    <div class="modal fade" id="editaLivro<?php echo $id[$i]; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar LIVRO</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="editaLivro.php" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Titulo do Livro</label>
                                            <input type="text" class="form-control" id="tituloLivro" name="tituloLivro" value="<?php echo $titulo[$i]; ?>"
                                                placeholder="Digite o Titulo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">ANO LIVRO</label>
                                            <input type="text" class="form-control" id="anoLivro"
                                                name="anoLivro" placeholder="Digite o Ano" value="<?php echo $anoPublicacao[$i]; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">ID DO AUTOR</label>
                                            <input type="text" class="form-control" id="idAutor"
                                                name="idAutor" placeholder="ID DO AUTOR" value="<?php echo $idAutor[$i]; ?>">
                                        </div>

                                        <div class="modal-footer">
                                            <input type="hidden" name="idLivro" value="<?php echo $id[$i]; ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Salvar Edição</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de Apagar -->
                    <div class="modal fade" id="apagaLivro<?php echo $id[$i]; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">APAGA LIVROA</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="apagaLivro.php" method="post">
                                        <div class="mb-3">
                                            <h3>Deseja realmente apagar essA LIVRO  ?</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="idLivro" value="<?php echo $id[$i]; ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Sim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </tbody>
        </table>
    </section>

    <section class="m-5">
        <table class="table table-bordered table-hover">
            <thead>
                <h2>Tabela de Editoras</h2>
                <tr>
                    <th class="center">ID</th>
                    <th class="center">Nome</th>
                    <th class="center">Localização</th>
                    <th class="center">ACAO</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($id_editora); $i++) { ?>
                    <tr>
                        <td class="center">
                            <?php echo $id_editora[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $nome_editora[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $localizacao[$i]; ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editaEditora<?php echo $id_editora[$i]; ?>">EDITA EDITORA</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagaEditora<?php echo $id_editora[$i]; ?>">Apagar</button>
                        </td>
                        
                    </tr>
                    
                    <!-- Modal de Editar -->
                    <div class="modal fade" id="editaEditora<?php echo $id_editora[$i]; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar EDITORA</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="editaEditora.php" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nome doA EDITOA</label>
                                            <input type="text" class="form-control" id="nomeEditora" name="nomeEditora" value="<?php echo $nome_editora[$i]; ?>"
                                                placeholder="Digite o nome">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Localização</label>
                                            <input type="text" class="form-control" id="localizacaoEditora"
                                                name="localizacaoEditora" placeholder="Digite a LOCALIZACAO" value="<?php echo $localizacao[$i]; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="idEditora" value="<?php echo $id_editora[$i]; ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Salvar Edição</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de Apagar -->
                    <div class="modal fade" id="apagaEditora<?php echo $id_editora[$i]; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">APAGA EDITORA</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="apagaEditora.php" method="post">
                                        <div class="mb-3">
                                            <h3>Deseja realmente apagar essA EDITORA?</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="idEditora" value="<?php echo $id_editora[$i]; ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Sim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </tbody>
        </table>
    </section>

    <section class="m-5">
        <table class="table table-bordered table-hover">
            <thead>
                <h2>Tabela de Autores</h2>
                <tr>
                    <th class="center">ID</th>
                    <th class="center">Nome</th>
                    <th class="center">Nacionalidade</th>
                    <th class="center">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($id_autor); $i++) { ?>
                    <tr>
                        <td class="center">
                            <?php echo $id_autor[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $nome_autor[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $nacionalidade[$i]; ?>
                        </td>
                        <td class="center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editaAutor<?php echo $id_autor[$i]; ?>">
                                Editar
                            </button>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#apagaAutor<?php echo $id_autor[$i]; ?>">
                                Apagar
                            </button>
                        </td>
                    </tr>
                    <!-- Modal de Editar -->
                    <div class="modal fade" id="editaAutor<?php echo $id_autor[$i]; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Autor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="editaAutor.php" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nome do Autor</label>
                                            <input type="text" class="form-control" id="nomeAutor" name="nomeAutor" value="<?php echo $nome_autor[$i]; ?>"
                                                placeholder="Digite o nome">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nacionalidade</label>
                                            <input type="text" class="form-control" id="nacionalidadeAutor"
                                                name="nacionalidadeAutor" placeholder="Digite a nacionalidade" value="<?php echo $nacionalidade[$i]; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="idAutor" value="<?php echo $id_autor[$i]; ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Salvar Edição</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de Apagar -->
                    <div class="modal fade" id="apagaAutor<?php echo $id_autor[$i]; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Autor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="apagaAutor.php" method="post">
                                        <div class="mb-3">
                                            <h3>Deseja realmente apagar esse autor?</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="idAutor" value="<?php echo $id_autor[$i]; ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Sim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <section class="m-5">
        <table class="table table-bordered table-hover">
            <thead>
                <h2>Tabela Geral</h2>
                <tr>
                    <th class="center">ID do Livro</th>
                    <th class="center">Título do Livro</th>
                    <th class="center">Ano de Publicação</th>
                    <th class="center">ID do autor</th>
                    <th class="center">Nome do autor</th>
                    <th class="center">Nacionalidade do autor</th>
                    <th class="center">ID da editora</th>
                    <th class="center">Nome da editora</th>
                    <th class="center">Localização da editora</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($idLivroGeral); $i++) { ?>
                    <tr>
                        <td class="center">
                            <?php echo $idLivroGeral[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $tituloLivroGeral[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $anoPublicacaoLivroGeral[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $idAutorGeral[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $nomeAutorGeral[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $nacionalidadeAutorGeral[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $idEditoraGeral[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $nomeEditoraGeral[$i]; ?>
                        </td>
                        <td class="center">
                            <?php echo $localizacaoEditoraGeral[$i]; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>


    <section class="mt-5 px-5">
        <form action="insereAutor.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome do Autor</label>
                <input type="text" class="form-control" id="nomeAutor" name="nomeAutor" placeholder="Digite o nome">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nacionalidade</label>
                <input type="text" class="form-control" id="nacionalidadeAutor" name="nacionalidadeAutor"
                    placeholder="Digite a nacionalidade">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>