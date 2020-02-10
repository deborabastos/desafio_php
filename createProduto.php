<?php
// print_r($_POST);

require_once('./includes/valida_form.php');

// ****************************** GRAVANDO EM JSON ****************************** 
//Verificando se há erros no form para, então, enviar

if(isset($_POST['submit'])){
    if(array_filter($errors)){
        echo 'Corrija os erros do formulário';
    } else {

        // enviar dados para json        
        if(file_exists('produtos.json')){
            $json_dados_existentes = file_get_contents('produtos.json'); //pega os dados existentes no json e coloca em um array
            $php_dados_existentes = json_decode($json_dados_existentes, true); // transforma os dados do array em dados php via json_decode
            $novos_dados = array(                               // captura dados entrados no forumlário
                'nome' => $_POST['nome'],
                'preco' => $_POST['preco'],
                'descricao' => $_POST['descricao'],
                'imagem' => $_POST['imagem']
            );
            $php_dados_existentes[] = $novos_dados;   // coloca dados existentes no array de dados existentes
            $json_produtos = json_encode($php_dados_existentes);
            
            if(file_put_contents('produtos.json', $json_produtos)){
                echo 'Produto salvo com sucesso';
            };
        } else {
            echo 'JSON file não existe';
        }; 


    };


    
};


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Meu CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Desafio PHP</title>
</head>
<body>
    <header>
        <?php include("./includes/nav.php"); ?>
    </header>

    <main>
        <div class="container my-5">
                <h1>Adicionar Produto</h1>

            <form action="#" method="POST" class="">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome ?>" >
                            <div class="text-danger font-weight-bold">
                                
                                    <p><?= $errors['nome'] ?></p>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">

                            <label for="preco">Preço:</label>
                            <input type="text" name="preco" id="preco" class="form-control" placeholder="R$ 00,00" value="<?= $preco ?>">
                            <div class="text-danger font-weight-bold">
                                 <p><?= $errors['preco'] ?></p>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" id="descricao" class="form-control" rows="8"><?= $descricao ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="custom-file altura_file mb-2">
                            <label for="imagem" class="custom-file-label">Selecione a foto</label>
                            <input type="file" name="imagem" id="imagem" class="custom-file-input" accept="image/*"><br>
                                <div class="text-danger font-weight-bold">
                                 
                                        <p><?= $errors['imagem'] ?></p>
                                 
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Adicionar</button>
                        </div>
                    </div>
                </div>



            </form>

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