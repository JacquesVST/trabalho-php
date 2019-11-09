<?php
require_once('../Sql.php');
require_once('../model/Venda.php');
require_once('../model/ItemVenda.php');
require_once('../controller/ProdutoController.php');
class VendaDAO
{

    private $sql;

    public function __construct()
    {
        $this->sql = new Sql();
    }

    public function novaVenda($idFuncionario){
        $this->sql->query('INSERT INTO venda (id_funcionario) VALUES (:idf)',[':idf'],[$idFuncionario]);
        return $this->sql->query('SELECT * FROM venda ORDER BY id DESC LIMIT 1',[],[])[0]->id;


    }

    public function salvarItenVenda($itens,$id){

        foreach ($itens as $nome => $qtd){
            if($qtd > 0){
                $this->sql->query('INSERT INTO item_venda (produto, id_venda, quantidade) VALUES (:p, :i, :q)',
                    [':p',':i',':q'],[$nome,$id,$qtd]);
            }

        }
    }

    public function recuperarVendas(){
        $vendas = $this->sql->query('SELECT * FROM venda',[],[]);
        $retorno = [];
        foreach ($vendas as $venda){
            $v = new Venda();
            $v->setId($venda->id);
            $v->carregarFuncionario($venda->id_funcionario);
            array_push($retorno,$v);
        }

        return $retorno;
    }

    public function recuperarItensVendaPorIdVenda($idVenda){
        $itv = $this->sql->query('SELECT * FROM item_venda WHERE id_venda = :idv',[':idv'],[$idVenda]);
        $retorno = [];
        foreach ($itv as $item){
            $i = new ItemVenda();
            $i->setId($item->id);
            $i->setQuantidade($item->quantidade);
            $i->setProduto($item->produto);
            array_push($retorno, $i);
        }

        return $retorno;
    }

}
