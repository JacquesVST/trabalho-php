<?php

    require_once('../DAO/VendaDAO.php');
    require_once('../controller/ProdutoController.php');
    class VendaController{
        private $vendaDAO;
        private $produtoController;
        public function __construct()
        {
            $this->vendaDAO = new VendaDAO();
           $this->produtoController = new ProdutoController();
        }


        public function novaVenda($idFuncionario, $array){
           $id =  $this->vendaDAO->novaVenda($idFuncionario);
           $novoArray = [];
           foreach ($array as $key => $value){
               $produto = $this->produtoController->listarPorID($key);
               $novoArray[$produto->getDescricao()] = $value;
               $this->produtoController->editar($produto->getId(), $produto->getDescricao(), $produto->getQuantidade() - $value, $produto->getValor());
           }
           $this->vendaDAO->salvarItenVenda($novoArray,$id);
        }

        public function recuperarTodas(){
            return $this->vendaDAO->recuperarVendas();
        }

        public function recuperarTodosItens($idv){
            return $this->vendaDAO->recuperarItensVendaPorIdVenda($idv);
        }
    }