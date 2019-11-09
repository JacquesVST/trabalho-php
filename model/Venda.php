<?php

    require_once('../controller/FuncionarioController.php');

    class Venda{

        private $id;
        private $funcionario;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        public function getFuncionario(){
            return $this->funcionario;
        }

        public function setFuncionario($funcionario){
            $this->funcionario = $funcionario;
        }


        public function carregarFuncionario($id){
            $funcionarioController = new FuncionarioController();
            $this->funcionario =  $funcionarioController->listarPorID($id);
        }

        
    }