<?php
require_once('../Sessao.php');
Sessao::somenteUsuariosAutenticados('../view/login.php');

require_once('../controller/FuncionarioController.php');
$funcionarioController = new FuncionarioController();

if($_GET['motivo'] == 'novo'){

    $funcionarioController->cadastrar($_POST['nome']);
    header('location: ../view/funcionarios.php');
}

if($_GET['motivo'] == 'deletar'){
    $funcionarioController->deletar($_GET['id']);
    header('location: ../view/funcionarios.php');
}

if($_GET['motivo'] == 'editar'){
    $funcionarioController->editar($_GET['id'],$_POST['nome']);
    header('location: ../view/funcionarios.php');
}