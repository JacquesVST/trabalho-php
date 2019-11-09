<?php
require_once('../Sessao.php');
require_once('../controller/FuncionarioController.php');
Sessao::somenteUsuariosAutenticados('./login.php');

$funcionariosController = new FuncionarioController();
$funcionarios = $funcionariosController->listarTodos();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: purple !important; color: white !important;">
    <a class="navbar-brand" href="#" style="color: white !important;">Trabalho PHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="color: white !important;">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="./produtos.php" style="color: white !important;">Produtos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./funcionarios.php" style="color: white !important;">Funcionarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./vendas.php" style="color: white !important;">Vendas</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <br>
            <h4 class="text-left">Funcionarios</h4>
            <a href="novoFuncionario.php"> <button class="btn btn-success">Novo</button></a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($funcionarios as $funcionario){
                    echo '<tr>';
                    echo '<td scope="row">'.$funcionario->getId().'</td>';
                    echo '<td>'.$funcionario->getNome().'</td>';
                    echo '<td><a href="../api/funcionario.php?motivo=deletar&id='.$funcionario->getId().'"> <button class="btn btn-danger">Excluir</button> </a>
                                    <a href="editarFuncionario.php?id='.$funcionario->getId().'"> <button class="btn btn-warning">Editar</button> </a>
                                    </td>';


                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>