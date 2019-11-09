<?php

require_once('../Sessao.php');
Sessao::somenteUsuariosAutenticados('../view/login.php');
require_once('../controller/VendaController.php');
$vendaController = new VendaController();


$idFuncionario = $_POST['funcionario'];
unset($_POST['funcionario']);

$vendaController->novaVenda($idFuncionario, $_POST);

header('location: ../view/vendas.php');