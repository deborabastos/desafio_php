<?php
session_start();

require('./includes/produtos.inc.php');

if (!isset($_GET['id'])){
    include_once('./includes/not_found.php');
    exit;
}

$produtoId = $_GET['id'];

$produto = getProdutoById($produtoId);

if (!isset($produto)){
    include_once('./includes/not_found.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- JQuery --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Meu CSS -->
    <link rel="stylesheet" href="style.css">


    <title><?= $produto['nome'] ?></title>
</head>
<body>
    <header>
        <?php include("./includes/nav.php"); ?>
    </header>    

    <main>
        <div class="container my-5">
            <div class="row px-3">
                <h1 class="mr-auto"><?= $produto['nome'] ?></h1>
                <div>
                    <input type='button' class="btn btn-primary btn-sm mt-2" value='Voltar' onclick='history.go(-1)' />
                </div>
            </div>


            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nome: </th>
                        <td> <?= $produto['nome']?> </td>
                    </tr>
                    <tr>
                        <th>Descrição: </th>
                        <td> <?= $produto['descricao']?> </td>
                    </tr>
                    <tr>
                        <th>Preço: </th>
                        <td> <?= $produto['preco']?> </td>
                    </tr>
                    <tr>
                    <td colspan="2" style="text-align: center;">
                    <?php if(isset($produto['imagem'])):?>
                        <img style="width: 300px" class="m-2" src="./img/<?= $produto['imagem'] ?>" alt="" >
                     <?php endif; ?>
                    </td>

                    </tr>
                    
                    <tr>
                        <td colspan="2" style="text-align: center">
                                <a href="editProduto.php?id=<?= $produto['id']?>" role='button' class="btn btn-info btn-sm" >Editar</a>
                                <form method="POST" action="deleteProduto.php" class="d-inline-block">
                                    <input type="hidden" name="id" value="<?= $produto['id']; ?>">
                                    <button class="btn btn-danger btn-sm">Excluir</button>
                                </form> 
                        </td>
                    </tr>
                </tbody>


            </table>
        </div>
    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>