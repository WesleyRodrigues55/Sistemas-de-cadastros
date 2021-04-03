<?php
include("conexao.php");

$pesquisar = $_GET['pesquisa'];

if ($pesquisar != "") {
    $consulta = "SELECT * FROM cad_cliente WHERE nome='$pesquisar'";
} else {
    $consulta = "SELECT * FROM cad_cliente";
}

$con = @mysqli_query($conexao,$consulta) or die ($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de cadastro dos clientes</title>

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
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Clique aqui para cadastrar um novo usuario"><a href="cad_clienteVIEW.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg></a><br><p>Cadastrar outro cliente</p></button>
                </div>
            </div>
        </div>
    </nav>

    <section class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align: center;">Tabela com os clientes cadastrados.<h1>
                <hr>
                <form class="form-inline my-2 my-lg-0 pl-3-lg" action="cad_clienteLISTA.php">           

                <!-- caixa de pesquisa -->
                 <input class="form-control" type="search" placeholder="Pesquisar" id="pesquisa" name="pesquisa" aria-label="Search" style="width: 500px; padding: 20px;">
                   <button class="btn btn-success ml-1" type="submit" style="padding: 7px;">
                    <img src="search.png">
                </button>

                <!-- botão de incluir -->
                <div class="btn btn-info btn-lg" style="margin-left: 20px;">
                  <a href="cad_clienteVIEW.php" style="text-decoration: none; color: white;">
                    Incluir</a></div>

              </form>
                <br><br>

                <!-- começo tabela -->
            <table id="tabela" class="table">
                <thead class="thead-dark">
                    <tr id="tr1">
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Sexo</td>
                        <td>Estado civil</td>
                        <td>Profissão</td>
                        <td>data de nascimento</td>
                        <td>CPF</td>
                        <td>RG</td>
                        <td>Endereço</td>
                        <td>Número</td>
                        <td>Bairro</td>
                        <td>Complemento</td>
                        <td>CEP</td>
                        <td>UF</td>
                        <td>Cidade</td>
                        <td>Telefone</td>
                        <td>Celular</td>
                        <td>E-mail</td>
                        <td>Observações</td>
                        <td>Ação</td>
                        <td></td>
                    </tr>
                </thead>
                <?php while($dado = $con->fetch_array()) { ?>
                <tr>
                    <td id="td1"><?php echo $dado['id']; ?></td>
                    <td><?php echo $dado['nome']; ?></td>
                    <td><?php echo $dado['sexo']; ?></td>
                    <td><?php echo $dado['estadoCivil']; ?></td>
                    <td><?php echo $dado['profissao']; ?></td>
                    <td><?php echo $dado['data_nasc']; ?></td>
                    <td><?php echo $dado['CPF']; ?></td>
                    <td><?php echo $dado['RG']; ?></td>
                    <td><?php echo $dado['endereco']; ?></td>
                    <td><?php echo $dado['numero']; ?></td>
                    <td><?php echo $dado['bairro']; ?></td>
                    <td><?php echo $dado['complemento']; ?></td>
                    <td><?php echo $dado['CEP']; ?></td>
                    <td><?php echo $dado['UF']; ?></td>
                    <td><?php echo $dado['cidade']; ?></td>
                    <td><?php echo $dado['telefone']; ?></td>
                    <td><?php echo $dado['celular']; ?></td>
                    <td><?php echo $dado['email']; ?></td>
                    <td><?php echo $dado['observacoes']; ?></td>

                    <td> 
                        <a href="cad_clienteALTERARVIEW.php?codigo=<?php echo $dado['id']; ?>" class="btn btn-lg btn-primary btn-alterar" role="button">
                            <svg style="margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                            alterar
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

                                        <!-- INICO FORM -->
                                        <form method="post" name="usuario" action="cad_clienteAPAGAR-LINHA.php">
                                            <?php

                                                //ínclui a conexão com o banco
                                                include_once("conexao.php");

                                                //recuperar o código(id) em GET da aba LISTA
                                                $codigo = $dado['id'];

                                                //Select no banco na tabela
                                                $sqlconsulta = "select * from cad_cliente where id='$codigo'";

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
                                                        $dados = mysqli_fetch_array($resultado);
                                                        }
                                                    }
                                            ?>
                                            <div class="row">
                                                <!-- chamando o id -->
                                                <div class="col-md-1 form-group">
                                                    <label>Código(id)</label>
                                                    <input type="number" name="txtid" value='<?php echo $dados['id'];?>' readonly class="form-control">
                                                </div>
                                                <!-- separação -->
                                                <div class="col-md-11"></div>
                                                <!-- chamando o valor do nome-->
                                                <div class="col-md-4 form-group">
                                                    <label>Nome</label>
                                                    <input type="text" name="txtnome" value='<?php echo $dados['nome'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor do sexo -->
                                                <div class="col-md-1 form-group">
                                                    <label>Sexo</label>
                                                    <select class="form-control" name="txtsexo" id="combo" readonly>
                                                        <option><?php echo $dados['sexo'];?></option>
                                                    </select>
                                                </div>
                                                <!-- chamando o valor da Estado civil -->
                                                <div class="col-md-2 form-group">
                                                    <label>Estado civil</label>
                                                    <input type="text" name="txtestadoCivil" value='<?php echo $dados['estadoCivil'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de Profissão -->
                                                <div class="col-md-3 form-group">
                                                    <label>Profissão</label>
                                                    <input type="text" name="txtprofissao" value='<?php echo $dados['profissao'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de Data de nascimento -->
                                                <div class="col-md-2 form-group">
                                                    <label>Data de nascimento</label>
                                                    <input type="date" name="txtdata" value='<?php echo $dados['data_nasc'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de CPF -->
                                                <div class="col-md-2 form-group">
                                                    <label>CPF</label>
                                                    <input type="text" name="txtCPF" value='<?php echo $dados['CPF'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de RG -->
                                                <div class="col-md-2 form-group">
                                                    <label>RG</label>
                                                    <input type="text" name="txtRG" value='<?php echo $dados['RG'];?>' readonly class="form-control">
                                                </div>
                                                <!-- separação -->
                                                <div class="col-md-8"></div>
                                                <!-- chamando o valor de Endereço -->
                                                <div class="col-md-2 form-group">
                                                    <label>Endereço</label>
                                                    <input type="text" name="txtendereco" value='<?php echo $dados['endereco'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de Número -->
                                                <div class="col-md-1 form-group">
                                                    <label>Número</label>
                                                    <input type="number" name="txtnumero" value='<?php echo $dados['numero'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de Bairro -->
                                                <div class="col-md-2 form-group">
                                                    <label>Bairro</label>
                                                    <input type="text" name="txtbairro" value='<?php echo $dados['bairro'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de Complemento -->
                                                <div class="col-md-2 form-group">
                                                    <label>Complemento</label>
                                                    <input type="text" name="txtcomplemento" value='<?php echo $dados['complemento'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de CEP -->
                                                <div class="col-md-2 form-group">
                                                    <label>CEP</label>
                                                    <input type="number" name="txtCEP" value='<?php echo $dados['CEP'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de UF -->
                                                <div class="col-md-1 form-group">
                                                    <label>UF</label>
                                                    <select class="form-control" name="txtUF" id="combo1" readonly>
                                                        <option><?php echo $dados['UF'];?></option>
                                                    </select>
                                                </div>
                                                <!-- chamando o valor de Cidade -->
                                                <div class="col-md-2 form-group">
                                                    <label>Cidade</label>
                                                    <input type="text" name="txtcidade" value='<?php echo $dados['cidade'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de Telefone -->
                                                <div class="col-md-4 form-group">
                                                    <label>Telefone</label>
                                                    <input type="number" name="txttelefone" value='<?php echo $dados['telefone'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de Celular -->
                                                <div class="col-md-4 form-group">
                                                    <label>Celular</label>
                                                    <input type="number" name="txtcelular" value='<?php echo $dados['celular'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de E-mail -->
                                                <div class="col-md-4 form-group">
                                                    <label>E-mail</label>
                                                    <input type="email" name="txtemail" value='<?php echo $dados['email'];?>' readonly class="form-control">
                                                </div>
                                                <!-- chamando o valor de Observações -->
                                                <div class="col-md-12 form-group">
                                                    <label>Observações</label>
                                                    <textarea type="text" class="form-control" rows="5" id="observacoes"  name="txtobservacoes" readonly><?php echo $dados['observacoes'];?></textarea>
                                                </div>


                                                <br>
                                                <!-- chamando os botões para ações -->
                                                <div style="margin: auto;">
                                                    <button type="submit" name="btncal" class="btn btn-lg btn-primary">Excluir</button>
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
    </section> 
</body>
</html>