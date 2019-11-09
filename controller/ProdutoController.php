<?php
require_once('../model/Produto.php');
require_once ('../DAO/ProdutoDAO.php');

    class ProdutoController{

        private $produtoDAO;

        public function __construct()
        {
            $this->produtoDAO = new ProdutoDAO();
        }

        public function listarTodos(){
            return $this->produtoDAO->listarTodos();
        }

        public function listarPorID($id){
            return $this->produtoDAO->listarPorID($id);
        }

        public function cadastrar($descricao,$quantidade,$valor){
            $produto = new Produto();
            $produto->setDescricao($descricao);
            $produto->setQuantidade($quantidade);
            $produto->setValor($valor);
            $this->produtoDAO->cadastrar($produto);
        }

        public function deletar($id)
        {
            $this->produtoDAO->deletar($id);
        }

        public function editar($id, $descricao, $quantidade, $valor)
        {
            $produto = new Produto();
            $produto->setId($id);
            $produto->setDescricao($descricao);
            $produto->setQuantidade($quantidade);
            $produto->setValor($valor);
            $this->produtoDAO->editar($produto);
        }

    }