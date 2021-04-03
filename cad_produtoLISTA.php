<?php
// incluí a conexão com o banco
include("conexao.php");

//uma variável que recebe um valor em GET no input
$pesquisar = $_GET['pesquisa'];

if ($pesquisar != "") {
//Aqui selecionaremos a tabela usuario e suas linhas
$consulta = "SELECT * FROM cad_produto WHERE descricao='$pesquisar'";
} else {
    //caso a pesquisa seja nula, selecionaremos a tabela novamente
  $consulta = "SELECT * FROM cad_produto";
}

$con = @mysqli_query($conexao, $consulta) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de cadastro dos produtos</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- JS para animações -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<!-- CSS -->
<style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        
        .navegacao {
            background: rgb(135, 135, 197);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index:1;
        }
        
        .icones {
            text-align: center;
            margin: 20px;
        }
        
        #icone {
            color: rgb(255, 255, 255);
            transition: width 0.5s, height 0.5s;
        }
        
        #icone:hover {
            color: rgb(211, 197, 197);
            width: 50px;
            height: 50px;
        }
        
        p {
            color: white;
        }

        section {
          margin-top: 140px;
        }

        table {
            font-size: 17px;
        }

        #tr1>td {
            background: #FAF4A8;
        }

        #td1 {
            background: #FAF4A8;
        }
    </style>

</head>

<body>

    <nav class="navegacao">
        <div class="row">

            <div class="col-md-2">
                <!-- icone home -->
                <div class="icones">
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="clique aqui para ir ao menu inicial"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg></a><br><p>Home</p></button>
                </div>
            </div>

            <div class="col-md-2">
                <!-- icone usuario -->
                <div class="icones">
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Clique aqui para cadastrar um novo usuario"><a href="cad_produtoVIEW.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
            </svg></a><br><p>Cadastrar outro produto</p></button>
                </div>
            </div>
        </div>
    </nav>

    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Tabela com os produtos cadastrados.<h1>
                    <hr>
                    <form class="form-inline my-2 my-lg-0 pl-3-lg" action="cad_produtoLISTA.php">           

                        <!-- caixa de pesquisa -->
                        <input class="form-control" type="search" placeholder="Pesquisar" id="pesquisa" name="pesquisa" aria-label="Search" style="width: 500px; padding: 20px;">
                        <button class="btn btn-success ml-1" type="submit" style="padding: 7px;">
                            <img src="search.png">
                        </button>

                        <!-- botão de incluir -->
                        <div class="btn btn-info btn-lg" style="margin-left: 20px;">
                            <a href="cad_produtoVIEW.php" style="text-decoration: none; color: white;">
                            Incluir</a>
                        </div>

                        </form>
                        <br><br>

                        <!-- começo tabela -->
                        <table id="tabela" class="table">
                            <thead class="thead-dark">
                                <tr id="tr1">
                                    <td>Código</td>
                                    <td>Descrição</td>
                                    <td>Quantidade</td>
                                    <td>Preço R$</td>
                                    <td>Lote</td>
                                    <td>Data de validade</td>
                                    <td>Código de barras</td>
                                    <td>Fornecedor</td>
                                    <td>Ação</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <?php while($dado = $con->fetch_array()) { ?>
                                <tr>
                                    <td id="td1"><?php echo $dado['id']; ?></td>
                                    <td><?php echo $dado['descricao']; ?></td>
                                    <td><?php echo $dado['quantidade']; ?></td>
                                    <td><?php echo $dado['preco']; ?></td>
                                    <td><?php echo $dado['lote']; ?></td>
                                    <td><?php echo $dado['data_validade']; ?></td>
                                    <td><?php echo $dado['cod_barras']; ?></td>
                                    <td><?php echo $dado['fornecedor']; ?></td>

                                    </td>
                                    <td>
                                        <a href="cad_produtoALTERARVIEW.php?codigo=<?php echo $dado['id']; ?>" class="btn btn-primary btn-alterar" role="button">
                                            <svg style="margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                            </svg>alterar
                                        </a>
                                    </td>

                                    <td>
                                        <button id="botao-filmes" type="button" class="btn btn-primary" data-toggle="modal" data-target="#idmodal<?php echo $dado['id']; ?>" style="margin: 20px;">
                                            Excluir
                                        </button>

                                        <!-- MODALLLLL -->
                                        <div class="modal fade" id="idmodal<?php echo $dado['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" id="modal-color">
                                                    <!-- Aqui chama o título do modal -->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Exclusão</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Aqui chama o Body dele (conteúdo) -->
                                                    <div class="modal-body">

                                                        <form method="post" name="usuario" action="cad_produtoAPAGAR-LINHA.php">
                                                            <?php

                                                                //ínclui a conexão com o banco
                                                                include_once("conexao.php");

                                                                //recuperar o código(id) em GET da aba LISTA
                                                                $codigo = $dado['id'];

                                                                //Select no banco na tabela
                                                                $sqlconsulta = "select * from cad_produto where id='$codigo'";

                                                                //executando instruções
                                                                $resultado = @mysqli_query($conexao, $sqlconsulta);
                                                                    if (!$resultado) {
                                                                        echo '<input> type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
                                                                        die ('<h4>Query inválida: </h4>' . @mysqli_error($conexao));
                                                                    } else {
                                                                        $num = @mysqli_num_rows($resultado);
                                                                        if ($num == 0) {
                                                                            echo "<h4>Código: </h4> não localizado ! <br><br>";
                                                                            echo '<input type="button" onclick="window.location='."'index.php'".';"value="Voltar"><br><br>';
                                                                            exit;
                                                                        } else {
                                                                            $dado = mysqli_fetch_array($resultado);
                                                                        }
                                                                    }
                                                            ?>
                                                            <div class="row">
                                                                <!-- chamando o id -->
                                                                <div class="col-md-3 form-group">
                                                                    <label>Código(id)</label>
                                                                    <input type="number" name="txtid" value='<?php echo $dado['id'];?>' readonly class="form-control">
                                                                </div>
                                                                <!-- chamando a descrição -->
                                                                <div class="col-md-12 form-group">
                                                                    <label>Descrição</label>
                                                                    <input type="text" name="txtdescricao" value='<?php echo $dado['descricao'];?>' readonly class="form-control">
                                                                </div>
                                                                <!-- chamando o valor da quantidade -->
                                                                <div class="col-md-3 form-group">
                                                                    <label>Quantidade</label>
                                                                    <input type="number" name="txtquant" value='<?php echo $dado['quantidade'];?>' readonly class="form-control">
                                                                </div>
                                                                <!-- chamando o valor do preço -->
                                                                <div class="col-md-3 form-group">
                                                                    <label>Preço</label>
                                                                    <input type="text" name="txtpreco" value='<?php echo $dado['preco'];?>' readonly class="form-control">
                                                                </div>
                                                                <!-- chamando o valor do lote -->
                                                                <div class="col-md-6 form-group">
                                                                    <label>Lote</label>
                                                                    <input type="text" name="txtlote" value='<?php echo $dado['lote'];?>' readonly class="form-control">
                                                                </div>
                                                                <!-- chamando o valor da data -->
                                                                <div class="col-md-5 form-group">
                                                                    <label>Data de válidade</label>
                                                                    <input type="date" name="txtdata" value='<?php echo $dado['data_validade'];?>' readonly class="form-control">
                                                                </div>
                                                                <!-- chamando o valor do código de barras -->
                                                                <div class="col-md-7 form-group">
                                                                    <label>Código de barras</label>
                                                                    <input type="number" name="txtcodBarras" value='<?php echo $dado['cod_barras'];?>' readonly class="form-control">
                                                                </div>
                                                                <!-- chamando o valor do fornecedor -->
                                                                <div class="col-md-12 form-group">
                                                                    <label>Fornecedor</label>
                                                                    <input type="text" name="txtfornecedor" value='<?php echo $dado['fornecedor'];?>' readonly class="form-control">
                                                                </div>


                                                                <br>
                                                                <!-- chamando os botões para ações -->
                                                                <div style="margin: auto;">
                                                                    <button type="submit" name="btncal" class="btn btn-primary">Excluir</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <!-- Aqui chama o rodapé, usados para botões, exemplo btnsair -->
                                                        <div class="modal-footer">
                                                            <button style="color: black" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                            <?php } ?>    
                        </table>
                    </div>
            </div>
    </section>

</body>
</html>