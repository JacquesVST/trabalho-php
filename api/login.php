<?php

if(isset($_POST['login'], $_POST['senha'])){
    require_once('../controller/LoginController.php');
    $loginController = new LoginController();
    if($loginController->logar($_POST['login'], md5($_POST['senha']))){
        header('location: ../view/produtos.php');
    } else {
        header('location: ../view/login.php');
    }
}