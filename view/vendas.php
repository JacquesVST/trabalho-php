<?php
require_once('../Sessao.php');
Sessao::somenteUsuariosAutenticados('./login.php');
require_once('../controller/VendaController.php');
$vendaController = new VendaController();

$vendas = $vendaController->recuperarTodas();
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
    require_once('header.php');
?>  
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <br>
            <h4 class="text-left">Vendas</h4>

            <a href="novaVenda.php"><button class="btn btn-success">Nova Venda</button></a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Funcionario Responsável</th>
                    <th scope="col">Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($vendas as $venda){
                    echo '<tr>';
                    echo '<td scope="row">'.$venda->getId().'</td>';
                    echo '<td scope="row">'.$venda->getFuncionario()->getNome().'</td>';
                    echo '<td scope="row"><a href="./visualizarVenda.php?id='.$venda->getId().'&funcionario='.$venda->getFuncionario()->getNome().'"> <button class="btn btn-info">Visualizar</button></td></a>';
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