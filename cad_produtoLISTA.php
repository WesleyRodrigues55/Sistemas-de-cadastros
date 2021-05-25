<?php
include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();
?>
<?php
// incluí a conexão com o banco
include("conexao.php");

//uma variável que recebe um valor em GET no input
$pesquisar = $_GET['pesquisa'];

if ($pesquisar != "") {
//Aqui selecionaremos a tabela usuario e suas linhas
$consulta = "SELECT * FROM cad_produto WHERE descricao like '%$pesquisar%'";
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
        
        #pesquisa {
            border: 0 none;
            border-bottom: 1px solid rgba(50, 50, 50, 0.2);
            outline: 0;
        }

        #icone-search {
            color: #333;
        }

        #icone-search:hover {
            color: black;
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
                <!-- icone produto -->
                <div class="icones">
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Clique aqui para cadastrar outro produto"><a href="cad_produtoVIEW.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
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
                    <div style="display: flex;justify-content: space-between;">
                        <form class="form-inline my-2 my-lg-0 pl-3-lg" action="cad_produtoLISTA.php" method="get">           
                        <!-- caixa de pesquisa -->
                        <input class="form-control" type="search" placeholder="Pesquisar" id="pesquisa" name="pesquisa" aria-label="Search" style="width: 500px; padding: 20px;">
                        <button class="btn ml-1" type="submit" style="padding: 10px;">
                            <svg id="icone-search" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                        </form>

                        <a href="cad_produtoRELATORIO.php" target="_blank"  style="color: white; text-decoration: none;">
                            <button type="button" class="btn btn-info" style="padding: 10px;">
                                <svg style="margin: 0 10px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar2-range" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM9 8a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zm-8 2h4a1 1 0 1 1 0 2H1v-2z"/>
                                </svg>Gerar relatório
                            </button>
                        </a>
                    </div>
                        <br><br>

                        <!-- começo tabela -->
                        <table id="tabela" class="table">
                            <thead class="thead-dark">
                                <tr id="tr1">
                                    <td>Código</td>
                                    <td>Descrição</td>
                                    <td>Foto</td>
                                    <td>Quantidade</td>
                                    <td>Preço R$</td>
                                    <td>Data de validade</td>
                                    <td>Fornecedor</td>
                                    <td>Ação</td>
                                </tr>
                            </thead>
                            <?php while($dado = $con->fetch_array()) { ?>
                                <tr>
                                    <td id="td1"><?php echo $dado['id']; ?></td>
                                    <td><?php echo $dado['descricao']; ?></td>
                                    <td><img src="img/<?php echo $dado['img_produto']; ?>" style="width: 55px; height: 50px; text-align:center;"></td>
                                    <td><?php echo $dado['quantidade']; ?></td>
                                    <td><?php echo('R$ '); echo $dado['preco']; ?></td>
                                    <td><?php echo $dado['data_validade']; ?></td>
                                    <td><?php echo $dado['fornecedor']; ?></td>

                                    </td>
                                    <td style="display: flex">
                                        <button type="button" class="btn btn-primary" style="margin: 10px;"><a href="cad_produtoALTERARVIEW.php?codigo=<?php echo $dado['id']; ?>" style="color: white; text-decoration: none;">
                                            Alterar</a>
                                        </button>

                                        <button id="botao-filmes" type="button" class="btn btn-danger" data-toggle="modal" data-target="#idmodal<?php echo $dado['id']; ?>" style="margin: 10px;">
                                            Excluir
                                        </button>

                                        <!-- MODALLLLL -->
                                        <div class="modal fade" id="idmodal<?php echo $dado['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" id="modal-color">
                                                    <!-- Aqui chama o título do modal -->
                                                    <div class="modal-header" style="margin: 0 auto;">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Deseja mesmo excluir este produto?</h5>
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
                                                                    <button style="padding: 5px 20px;" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                    <button style="padding: 5px 20px;" type="submit" name="btncal" class="btn btn-primary">Apagar</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <!-- Aqui chama o rodapé, usados para botões, exemplo btnsair -->
                                                        <!-- <div class="modal-footer">
                                                            <button style="color: black" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                        </div> -->
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