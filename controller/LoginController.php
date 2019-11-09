<?php

    require_once('../Sql.php');
    require_once('../Sessao.php');
    class LoginController{

        private $sql;

        public function __construct()
        {
            $this->sql = new Sql();
        }

        public function logar($login, $senha){
            $usuarios = $this->sql->query('SELECT * FROM usuarios WHERE login = :login AND senha = :senha',
                [':login',':senha'],[$login,$senha]);

            if(count($usuarios) < 1)
                return false;

            Sessao::setVariavel('nome',$usuarios[0]->nome);
            Sessao::setVariavel('autenticado',true);
            return true;
        }
    }