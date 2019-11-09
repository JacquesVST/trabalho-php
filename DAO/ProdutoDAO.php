<?php
require_once('../Sql.php');
require_once('../model/Produto.php');
class ProdutoDAO
{

    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function listarTodos(){
        $produtos = $this->sql->query('SELECT * FROM produtos',[],[]);
        $retorno = [];

        foreach ($produtos as $produto){
            $prod = new Produto();
            $prod->setDescricao($produto->descricao);
            $prod->setId($produto->id);
            $prod->setQuantidade($produto->quantidade);
            $prod->setValor($produto->valor);
            array_push($retorno,$prod);
        }

        return $retorno;
    }

    public function listarPorID($id){
        $produto = $this->sql->query('SELECT * FROM produtos WHERE id = :id',[':id'],[$id]);
        if(count($produto) == 1){
            $retorno = new Produto();
            $retorno->setValor($produto[0]->valor);
            $retorno->setId($id);
            $retorno->setQuantidade($produto[0]->quantidade);
            $retorno->setDescricao($produto[0]->descricao);
            return $retorno;
        }

        return null;
    }

    public function cadastrar(Produto $produto)
    {
        $this->sql->query('INSERT INTO produtos (descricao, quantidade, valor) VALUES (:d,:q,:v)',[':d',':q',':v'],[$produto->getDescricao(), $produto->getQuantidade(), $produto->getValor()]);
    }

    public function deletar($id)
    {
        $this->sql->query('DELETE FROM produtos WHERE id = :id',[':id'],[$id]);
    }

    public function editar(Produto $produto)
    {
        $this->sql->query('UPDATE produtos SET descricao = :desc, valor = :val, quantidade = :qtd WHERE id = :id'
        ,[':desc',':val',':qtd',':id'],[$produto->getDescricao(),$produto->getValor(),$produto->getQuantidade(),$produto->getId()]);
    }
}