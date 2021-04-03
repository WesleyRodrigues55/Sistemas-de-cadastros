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

                                                        <form method="post" name="usuario" action="cad_fornecedorAPAGAR-LINHA.php">
                                                            <?php

                                                                //ínclui a conexão com o banco
                                                                include_once("conexao.php");

                                                                //recuperar o código(id) em GET da aba LISTA
                                                                $codigo = $dado['id'];

                                                                //Select no banco na tabela
                                                                $sqlconsulta = "select * from cad_fornecedor where id='$codigo'";

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
                                                                <div class="col-md-4 form-group">
                                                                    <label>Código(id)</label>
                                                                    <input type="number" name="txtid" value='<?php echo $dado['id'];?>' readonly class="form-control">
                                                                </div>
                                                                <!-- RAZAO SOCIAL -->
                                                            <div class="form-group col-md-12">
                                                                    <label>Razão social</label>
                                                                    <input type="text" class="form-control" id="razao" name="txtrazao" value='<?php echo $dado['razao_social'];?>' readonly>
                                                                </div>   
                                                                <!-- DATA-ABERTURA -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Data abertura</label>
                                                                    <input type="date" class="form-control" id="data-abertura" name="txtdata-abertura" value='<?php echo $dado['data_abertura'];?>' readonly>
                                                                </div>
                                                                <!-- TIPO -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Tipo</label>
                                                                    <select class="form-control" id="combo" name="txttipo" readonly>
                                                                        <option><?php echo $dado['tipo'];?></option>
                                                                    </select>
                                                                </div>
                                                                <!-- REGIME TRIBUTÁRIO -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Rigimes tributários</label>
                                                                    <select class="form-control" id="combo2" name="txtregime" readonly>
                                                                        <option><?php echo $dado['regime'];?></option>
                                                                </select>
                                                                </div>
                                                                <!-- CNPJ -->
                                                                <div class="form-group col-md-6">
                                                                    <label>CNPJ</label>
                                                                    <input type="text" class="form-control" id="cnpj" name="txtcnpj" value='<?php echo $dado['CNPJ'];?>' readonly>
                                                                </div>
                                                                <!-- INSCRIÇÃO ESTADUAL -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Inscrição estadual</label>
                                                                    <input type="text" class="form-control" id="ie" name="txtie" value='<?php echo $dado['IE'];?>' readonly>
                                                                </div>
                                                                <!-- ISENTO -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Isento</label>
                                                                    <select class="form-control" id="combo" name="txtisento" readonly>
                                                                        <option><?php echo $dado['ISENTO'];?></option>
                                                                        <option>...</option>
                                                                        <option>Contribuente</option>
                                                                        <option>Isento</option>
                                                                    </select>
                                                                </div>
                                                                <!-- INSCRIÇÃO MUNICIPAL -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Inscrição municipal</label>
                                                                    <input type="text" class="form-control" id="im" name="txtim"  value='<?php echo $dado['IM'];?>' readonly>
                                                                </div>
                                                                <!-- VENDEDOR / REPRESENTANTE -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Vendedor / Representante</label>
                                                                    <input type="text" class="form-control" id="vendedor" name="txtvendedor"  value='<?php echo $dado['vendedor'];?>' readonly>
                                                                </div>
                                                                <!-- E-MAIL -->
                                                                <div class="form-group col-md-6">
                                                                    <label>E-MAIL</label>
                                                                    <input type="email" class="form-control" id="email" name="txtemail"  value='<?php echo $dado['email'];?>' readonly>
                                                                </div>
                                                                <!-- CELULAR -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Celular</label>
                                                                    <input type="text" class="form-control" id="celular" name="txtcelular"  value='<?php echo $dado['celular'];?>' readonly>
                                                                </div>
                                                                <!-- TELEFONE 1 -->
                                                                <div class="form-group col-md-6">
                                                                    <label>TELEFONE 1</label>
                                                                    <input type="text" class="form-control" id="telefone1" name="txttelefone1"  value='<?php echo $dado['telefone1'];?>' readonly>
                                                                </div>
                                                                <!-- TELEFONE 2 -->
                                                                <div class="form-group col-md-6">
                                                                    <label>TELEFONE 2</label>
                                                                    <input type="text" class="form-control" id="telefone2" name="txttelefone2"  value='<?php echo $dado['telefone2'];?>' readonly>
                                                                </div>
                                                                <!-- CEP -->
                                                                <div class="form-group col-md-6">
                                                                    <label>CEP</label>
                                                                    <input type="text" class="form-control" id="cep" name="txtcep"  value='<?php echo $dado['CEP'];?>' readonly>
                                                                </div>
                                                                <!-- ENDEREÇO -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Endereço</label>
                                                                    <input type="text" class="form-control" id="endereco" name="txtendereco"  value='<?php echo $dado['endereco'];?>' readonly>
                                                                </div>
                                                                <!-- NÚMERO -->
                                                                <div class="form-group col-md-3">
                                                                    <label>Número</label>
                                                                    <input type="text" class="form-control" id="numero" name="txtnumero"  value='<?php echo $dado['numero'];?>' readonly>
                                                                </div>
                                                                <!-- COMPLEMENTO -->
                                                                <div class="form-group col-md-9">
                                                                    <label>Complemento</label>
                                                                    <input type="text" class="form-control" id="complemento" name="txtcomplemento"  value='<?php echo $dado['complemento'];?>' readonly>
                                                                </div>
                                                                <!-- BAIRRO -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Bairro</label>
                                                                    <input type="text" class="form-control" id="bairro" name="txtbairro"  value='<?php echo $dado['bairro'];?>' readonly>
                                                                </div>
                                                                <!-- CIDADE -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Cidade</label>
                                                                    <input type="text" class="form-control" id="cidade" name="txtcidade"  value='<?php echo $dado['cidade'];?>' readonly>
                                                                </div>
                                                                <!-- ESTADO -->
                                                                <div class="form-group col-md-3">
                                                                    <label>Estado</label>
                                                                    <input type="text" class="form-control" id="estado" name="txtestado"  value='<?php echo $dado['estado'];?>' readonly>
                                                                </div>
                                                                <!-- SITE -->
                                                                <div class="form-group col-md-9">
                                                                    <label>Site</label>
                                                                    <input type="text" class="form-control" id="site" name="txtsite"  value='<?php echo $dado['site'];?>' readonly>
                                                                </div>
                                                                <!-- E-MAIL DE COBRANÇA PARA ENVIO XML -->
                                                                <div class="form-group col-md-12">
                                                                    <label>E-mail de cobrança para envio do XML</label>
                                                                    <input type="email" class="form-control" id="emailcobranca" name="txtemail-cobranca"  value='<?php echo $dado['email_cobranca'];?>' readonly>
                                                                </div>
                                                                <!-- DATA DE CADASTRO -->
                                                                <div class="form-group col-md-6">
                                                                    <label>Data de cadastro</label>
                                                                    <input type="date" class="form-control" id="data-cadastro" name="txtdata-cadastro"  value='<?php echo $dado['data_cadastro'];?>' readonly>
                                                                </div>
                                                                <!-- OBSERVAÇÕES -->
                                                                <div class="form-group col-md-12">
                                                                    <label>Observação</label>
                                                                    <textarea class="form-control" rows="5" id="observacao" name="txtobservacao" id="observacao" readonly><?php echo $dado['observacao'];?></textarea>
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
                            <?php }?>
                        </table>
                    </div>
            </div>
    </section>
    
</body>
</html>