<?php
require_once('../model/Produto.php');
require_once ('../DAO/FuncionarioDAO.php');

class FuncionarioController{

    private $funcionarioDAO;

    public function __construct()
    {
        $this->funcionarioDAO = new FuncionarioDAO();
    }

    public function listarTodos(){
        return $this->funcionarioDAO->listarTodos();
    }

    public function listarPorID($id){
        return $this->funcionarioDAO->listarPorID($id);
    }

    public function cadastrar($nome){
        $funcionario = new Funcionario();
        $funcionario->setNome($nome);
        $this->funcionarioDAO->cadastrar($funcionario);
    }

    public function deletar($id)
    {
        $this->funcionarioDAO->deletar($id);
    }

    public function editar($id, $nome)
    {
        $funcionario = new Funcionario();
        $funcionario->setNome($nome);
        $funcionario->setId($id);
        $this->funcionarioDAO->editar($funcionario);
    }

}