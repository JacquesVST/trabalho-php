<?php
require_once('../Sql.php');
require_once('../model/Funcionario.php');
class FuncionarioDAO
{

    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function listarTodos(){
        $funcionarios = $this->sql->query('SELECT * FROM funcionario',[],[]);
        $retorno = [];

        foreach ($funcionarios as $funcionario){
            $func = new Funcionario();
            $func->setId($funcionario->id);
            $func->setNome($funcionario->nome);
            array_push($retorno,$func);
        }

        return $retorno;
    }

    public function listarPorID($id){
        $funcionario = $this->sql->query('SELECT * FROM funcionario WHERE id = :id',[':id'],[$id]);
        if(count($funcionario) == 1){
            $retorno = new Funcionario();
            $retorno->setNome($funcionario[0]->nome);
            $retorno->setId($id);
            return $retorno;
        }

        return null;
    }

    public function cadastrar(Funcionario $funcionario)
    {
        $this->sql->query('INSERT INTO funcionario (nome) VALUES (:n)',[':n'],[$funcionario->getNome()]);
    }

    public function deletar($id)
    {
        $vendas = $this->sql->query('SELECT * FROM venda WHERE id_funcionario = :idf',[':idf'],[$id]);
        foreach ($vendas as $venda){
            $this->sql->query('DELETE FROM item_venda WHERE id_venda = :idv',[':idv'],[$venda->id]);
            $this->sql->query('DELETE FROM venda WHERE id = :id',[':id'],[$venda->id]);
        }
        $this->sql->query('DELETE FROM funcionario WHERE id = :id',[':id'],[$id]);
    }

    public function editar(Funcionario $funcionario)
    {
        $this->sql->query('UPDATE funcionario SET nome = :nome WHERE id = :id'
            ,[':nome',':id'],[$funcionario->getNome(), $funcionario->getId()]);
    }
}