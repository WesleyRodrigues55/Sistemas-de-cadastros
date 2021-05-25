<?php
include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();

include("conexao.php");

//uma variável que recebe um valor em GET no input
// $pesquisar = $_GET['pesquisa'];

// if ($pesquisar != "") {
//Aqui selecionaremos a tabela usuario e suas linhas
// $consultap = "SELECT cad_produto.descricao FROM cad_produto WHERE cad_produto.descricao like '%$pesquisar%'";
// $consultap = "SELECT cad_produto.id, cad_produto.descricao, itens_venda.id_produto FROM cad_produto, itens_venda WHERE descricao like '%$pesquisar%'";
// } else {
//     caso a pesquisa seja nula, selecionaremos a tabela novamente
//   $consultap = "SELECT * FROM cad_produto";
// }

// amarração da venda com itens de venda, pegando o último registro do id (comando max)
$consulta1 = "SELECT max(id) as id FROM entrada";
$con1 = @mysqli_query($conexao, $consulta1) or die($mysql->error);
$dado=mysqli_fetch_array($con1);

// criando variável para selecionar os valores da tabela fornecedor 
$id_forn = $dado['id'];
$nome_forn = "select entrada.id_forn, cad_fornecedor.razao_social from entrada, cad_fornecedor where entrada.id = $id_forn and entrada.id_forn = cad_fornecedor.id";
$fornecedor = @mysqli_query($conexao,$nome_forn) or die($mysqli->error); 
$dado_forn=mysqli_fetch_array($fornecedor);

//select no produto
$consulta= "SELECT * FROM cad_produto";
$con=@mysqli_query($conexao, $consulta) or die ($mysqli->error);

?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>Entrada de produtos</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  

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
            z-index: 1;
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

        .content {
            margin-top: 100px;
        }

        /* pesquisar */
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

        /* tabela */
        table {
            font-size: 17px;
        }

        #tr1 {
            background: #FAF4A8;
        }

        #td1 {
            background: #FAF4A8;
        }

        /* tipografia */

        h5 {
            margin: 10px 0;
        }

        h3 {
            margin: 10px 0;
        }
    </style>

</head>


<body>

    <nav class="navegacao">
        <div class="row" id="nav-desktop">

            <div class=" col-xs-2 col-sm-2 col-md-2">
                <!-- icone home -->
                <div class="icones">
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="clique aqui para ir ao menu inicial"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
            </svg></a><br><p>Home</p></button>
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
                <!-- icone usuario -->
                <div class="icones">
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Clique aqui para cadastrar um novo usuario"><a href="cad_usuarioVIEW.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"/>
                    <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"/>
                    <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"/>
                    </svg></a><br><p>Consultar venda</p></button>
                </div>
            </div>


        </div>
    </nav>
    <!-- fim nav bar -->

    <br><br>
    <div class="container-fluid content">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Tabela com os produtos.<h1>
                <hr>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <!-- dados -->
                        
                            <div class="" style="margin: 20px">
                                <h5>Codigo:</h5>
                                <input class="form-control" type="text" style="width: 100px;" name="txtcodigo" value='<?php echo $dado_forn['id_forn']; ?>' readonly>
                                <h5>Nome fornecedor:</h5>
                                <input class="form-control" type="text" name="txtdesc" maxlength='80' style="width:550px" value='<?php echo $dado_forn['razao_social']; ?>'readonly>
                            </div>
                            <div style="margin: 20px">
                                <a href="cad_vendasEntrada.php" class="btn btn-info" role="button">
                                    Finalizar Venda
                                </a>
                                <a href="cad_consultaEntradaproduto.php?id_entrada=<?php echo $id_forn; ?>" class="btn btn-info" role="button" target="_blank">
                                    Consultar Venda
                                </a> 
                                
                                <a href="#" target="_blank">
                                    <button type="button" class="btn btn-info">
                                        <svg style="margin: 0 10px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar2-range" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM9 8a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zm-8 2h4a1 1 0 1 1 0 2H1v-2z"/>
                                        </svg>Gerar relatório
                                    </button>
                                </a>
                            </div>
                       
                        <div class="" style="margin-left: 20px">
                            <button class="btn btn-info" data-toggle="modal" data-target="#idmodal<?php echo $id_forn; ?>">
                                Consultar entrada teste
                            </button>
                        </div>

                        <!-- MODALLLLL -->
                        <div class="modal fade" id="idmodal<?php echo $id_forn; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" id="modal-color">
                                    <!-- Aqui chama o título do modal -->
                                    <div class="modal-header" style="margin: auto;">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Carrinho</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>

                                    <!-- Aqui chama o Body dele (conteúdo) -->
                                    <div class="modal-body">

                                        <?php

                                            echo $id_forn;

                                            
                                            //verificação para mostra descricao do produto
                                            $consulta = "SELECT cad_produto.id, cad_produto.descricao, itens_venda.id_venda, itens_venda.id_produto, itens_venda.quantidade, itens_venda.preco FROM cad_produto, itens_venda WHERE itens_venda.id_venda = $id_forn and itens_venda.id_produto = cad_produto.id";  
                                            $conn = @mysqli_query($conexao,$consulta) or die($mysqli -> error); 

                                            //fazendo select para exibição do total da venda
                                            $preco = "SELECT sum(preco * quantidade) as total FROM itens_venda where id_venda = $id_forn"; 
                                            
                                            //fazer soma dos produtos
                                            $con_preco = @mysqli_query($conexao,$preco) or die($mysqli -> error); 
                                            $total = mysqli_fetch_array($con_preco);

                                            echo '<br>' . "Total: R$ " . number_format($total['total'],2);
 
                                        ?>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <table id="grid_cadastro" class="table">

                                                    <thead class="thead-dark">      

                                                        <tr> 
                                                            <td>Produto</td> 
                                                            <td>Preço</td>           
                                                            <td>Qtd</td>          
                                                            <td>Total</td>
                                                        </tr> 

                                                    </thead>

                                                    <?php while($dados = $conn->fetch_array()) { ?> 

                                                        <tr> 
                                                            <td><?php echo $dados['descricao']; ?></td> 
                                                            <td><?php echo $dados['preco']; ?></td>           
                                                            <td><?php echo $dados['quantidade']; ?></td>            
                                                            <td><?php echo number_format($dados['preco'] * $dados['quantidade'],2); ?></td>           
                                                        </tr>

                                                    <?php } ?> 
                                                </table> 
                                            </div>
                                        </div>    

                                    </div>
                                    <!-- body modal -->

                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">voltar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fim modal -->
                    </div>
                    <!-- fim col -->


                    <form class="form-inline my-2 my-lg-0 pl-3-lg col-sm-12 col-md-6" method="get" action="cad_vendaprodutoVIEW.php">  
                        <div class="">        
                            <!-- caixa de pesquisa -->
                            <h3>Pesquisar</h3>
                            <input class="form-control" type="search" placeholder="Pesquisar" id="pesquisa" name="pesquisa" aria-label="Search" style="width: 500px; padding: 20px;">
                            <button class="btn ml-1" type="submit" style="padding: 10px;">
                                <svg id="icone-search" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </div> 
                    </form>
                </div>
                <br><br>


                <table class="table" id="tabela">
                    <thead>
                        <tr id="tr1">
                            <th>Código</th>
                            <th>Descrição do Produto</th>
                            <th>Preço</th>
                            <th style="text-align: center;">Foto</td>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <?php while ($dado = $con->fetch_array()) { ?>
                        <tbody>
                            <tr>
                                <td id="td1"><?php echo $dado['id']; ?> </td>
                                <td><?php echo $dado['descricao']; ?> </td>
                                <td><?php echo $dado['preco']; ?> </td>
                                <td style="text-align: center;"><img src="img/<?php echo $dado['img_produto']; ?>"width='50px' heigth='50px'></td>

                                <td>
                                    <a href="cad_itensENTRADA.php?codigo=<?php echo $dado['id']; ?>&id_entrada=<?php echo $id_forn; ?>&preco=<?php echo $dado['preco']; ?>&qtd=1" class="btn btn-info" role="button">
                                        Adicionar
                                    </a>
                                </td>
                            </tr>
                        </tbody>

                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>