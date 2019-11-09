<?php
    require_once('../Sessao.php');
    Sessao::somenteUsuariosAutenticados('../view/login.php');

    require_once('../controller/ProdutoController.php');
    $produtoController = new ProdutoController();

    if($_GET['motivo'] == 'novo'){

        $produtoController->cadastrar($_POST['descricao'],$_POST['quantidade'],$_POST['valor']);
        header('location: ../view/produtos.php');
    }

    if($_GET['motivo'] == 'deletar'){
        $produtoController->deletar($_GET['id']);
        header('location: ../view/produtos.php');
    }

    if($_GET['motivo'] == 'editar'){
        $produtoController->editar($_GET['id'],$_POST['descricao'],$_POST['quantidade'],$_POST['valor']);
        header('location: ../view/produtos.php');
    }