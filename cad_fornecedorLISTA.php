<?php
//inclui  a conexão com o banco
include("conexao.php");

//uma variável que recebe um valor em GET no input
$pesquisar = $_GET['pesquisa'];

if ($pesquisar != "") {
//Aqui selecionaremos a tabela usuario e suas linhas
$consulta = "SELECT * FROM cad_fornecedor WHERE razao_social='$pesquisar'";
} else {
    //caso a pesquisa seja nula, selecionaremos a tabela novamente
  $consulta = "SELECT * FROM cad_fornecedor";
}

$con = @mysqli_query($conexao, $consulta) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de cadastro dos fornecedores</title>

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
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Clique aqui para cadastrar um novo fornecedor"><a href="cad_fornecedorVIEW.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
                <path d="M14.12 10.163l1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
                <path d="M14.12 6.576l1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
            </svg></a><br><p>Cadastrar outro fornecedor</p></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- inicio conteudo -->
    <section class="container-fluid">
            <div class="row">
                    <div class="col-md-12">
                        <h1 style="text-align: center;">Tabela com os fornecedores cadastrados</h1>
                        <hr>
                        <form class="form-inline my-2 my-lg-0 pl-3-lg" action="cad_fornecedorLISTA.php">

                            <!-- caixa de pesquisa -->
                            <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisa" name="pesquisa" arial-label="Search" style="width: 500px; padding: 20px;">
                            <button class="btn btn-success ml-1" type="submit" style="padding:7px;">
                            <img src="search.png">
                            </button>

                            <!-- botão de incluir -->
                            <div class="btn btn-info btn-lg" style="margin-left: 20px;">
                            <a href="cad_fornecedorVIEW.php" style="text-decoration: none; color: white;">Incluir</a></div>
                        </form>
                        <!-- fim form -->
                        <br><br>
                        <!-- inicio tabela -->
                        <table id="tabela" class="table">
                            <thead class="thead-dark">
                                <tr id="tr1">
                                    <td>Código</td>
                                    <td>Razão social</td>
                                    <td>Data de abertura</td>
                                    <td>Tipo</td>
                                    <td>Regimes tributários</td>
                                    <td>CNPJ</td>
                                    <td>IE</td>
                                    <td>Isento</td>
                                    <td>IM</td>
                                    <td>Vendedor</td>
                                    <td>E-mail</td>
                                    <td>Celular</td>
                                    <td>Telefone 1</td>
                                    <td>Telefone 2</td>
                                    <td>CEP</td>
                                    <td>Endereço</td>
                                    <td>Número</td>
                                    <td>Complemento</td>
                                    <td>Bairro</td>
                                    <td>Cidade</td>
                                    <td>Estado</td>
                                    <td>Site</td>
                                    <td>E-mail envio XML</td>
                                    <td>Data de cadastro</td>
                                    <td>Observações</td>
                                    <td>Ação</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <?php while($dado = $con->fetch_array()) {?>
                                <tr>
                                    <td id="td1"><?php echo $dado['id'];?></td>
                                    <td><?php echo $dado['razao_social'];?></td>
                                    <td><?php echo $dado['data_abertura'];?></td>
                                    <td><?php echo $dado['tipo'];?></td>
                                    <td><?php echo $dado['regime'];?></td>
                                    <td><?php echo $dado['CNPJ'];?></td>
                                    <td><?php echo $dado['IE'];?></td>
                                    <td><?php echo $dado['ISENTO'];?></td>
                                    <td><?php echo $dado['IM'];?></td>
                                    <td><?php echo $dado['vendedor'];?></td>
                                    <td><?php echo $dado['email'];?></td>
                                    <td><?php echo $dado['celular'];?></td>
                                    <td><?php echo $dado['telefone1'];?></td>
                                    <td><?php echo $dado['telefone2'];?></td>
                                    <td><?php echo $dado['CEP'];?></td>
                                    <td><?php echo $dado['endereco'];?></td>
                                    <td><?php echo $dado['numero'];?></td>
                                    <td><?php echo $dado['complemento'];?></td>
                                    <td><?php echo $dado['bairro'];?></td>
                                    <td><?php echo $dado['cidade'];?></td>
                                    <td><?php echo $dado['estado'];?></td>
                                    <td><?php echo $dado['site'];?></td>
                                    <td><?php echo $dado['email_cobranca'];?></td>
                                    <td><?php echo $dado['data_cadastro'];?></td>
                                    <td><?php echo $dado['observacao'];?></td>


                                    <td><a style="margin: 5px;" href="cad_fornecedorALTERARVIEW.php?codigo=<?php echo $dado['id']; ?>" class="btn btn-primary btn-alterar" role="button">
                                    <svg style="margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>alterar</a></td>

                                    <td>
                                    <a style="margin: 5px;" href="cad_fornecedorEXCLUIR.php?codigo=<?php echo $dado['id']; ?>" class="btn btn-danger btn-excluir" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>excluir</a>
                                    </td>
                                </tr>
                                <?php }?>
                        </table>
                    </div>
            </div>
    </section>
    
</body>
</html>