<?php
    require_once('../Sessao.php');
    require_once('../controller/ProdutoController.php');
    Sessao::somenteUsuariosAutenticados('./login.php');

    $produtoController = new ProdutoController();
    $produtos = $produtoController->listarTodos();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<?php
    include 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <br>
            <h4 class="text-left">Produtos</h4>
            <a href="novoProduto.php"> <button class="btn btn-success">Novo</button></a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($produtos as $produto){
                        echo '<tr>';
                        echo '<td scope="row">'.$produto->getId().'</td>';
                        echo '<td>'.$produto->getDescricao().'</td>';
                        echo '<td>'.$produto->getQuantidade().'</td>';
                        echo '<td>R$ '.$produto->getValor().'</td>';
                        echo '<td><a href="../api/produto.php?motivo=deletar&id='.$produto->getId().'"> <button class="btn btn-danger">Excluir</button> </a>
                                    <a href="editarProduto.php?id='.$produto->getId().'"> <button class="btn btn-warning">Editar</button> </a>
                                    </td>';


                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>