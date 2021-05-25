<?php
include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>

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
          margin-top: 160px;
        }

        button {
            margin: 5px;
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
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Clique aqui para cadastrar um novo usuario"><a href="cad_usuarioVIEW.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg></a><br><p>Cadastrar outro fornecedor</p></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- INICIO CONTEUDO -->
    <section class="container-fluid">

        <!-- Executando formulário que receberá valores no input para alterações -->
        <form method="post" name="usuario" action="cad_fornecedorALTERAR.php">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center;">Alteração de fornecedores</h1>
                </div>

<!-- iniico PHP -->
<?php

include_once("conexao.php");

$codigo = $_GET['codigo'];
    
$sqlconsulta = "select * from cad_fornecedor where id='$codigo'";

$resultado = @mysqli_query($conexao, $sqlconsulta);
if (!$resultado) {
    echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
    die ('<h4>Query inválida: >/h4>' .@mysqli_error($conexao));
} else {
    $num = @mysqli_num_rows($resultado);
    if ($num == 0) {
        echo "<h4>Código: </h4: não localizado! <br><br>";
        echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
        exit;
    } else {
        $dados = mysqli_fetch_array($resultado);
    }
}

mysqli_close($conexao);
?>

 <!-- para alterações -->
                <!-- chamando o id -->
                <div class="col-md-1 form-group">
                    <label>Código(id)</label>
                    <input type="number" name="txtid" value='<?php echo $dados['id'];?>' readonly class="form-control">
                </div>
                <!-- separação -->
                <div class="col-md-11"></div>
                 <!-- RAZAO SOCIAL -->
               <div class="form-group col-md-4">
                    <label>Razão social</label>
                    <input type="text" class="form-control" id="razao" name="txtrazao" value='<?php echo $dados['razao_social'];?>'>
                </div>   
                <!-- DATA-ABERTURA -->
                <div class="form-group col-md-2">
                    <label>Data abertura</label>
                    <input type="date" class="form-control" id="data-abertura" name="txtdata-abertura" value='<?php echo $dados['data_abertura'];?>'>
                </div>
                <!-- TIPO -->
                <div class="form-group col-md-1">
                    <label>Tipo</label>
                    <select class="form-control" id="combo" name="txttipo">
                        <option><?php echo $dados['tipo'];?></option>
                        <option>...</option>
                        <option>SP</option>
                    </select>
                </div>
                <!-- REGIME TRIBUTÁRIO -->
                <div class="form-group col-md-2">
                    <label>Rigimes tributários</label>
                    <select class="form-control" id="combo2" name="txtregime">
                        <option><?php echo $dados['regime'];?></option>
                        <option>...</option>
                        <option>Simples nacional</option>
                        <option>Lucro presumido</option>
                        <option>Lucro real</option>
                </select>
                </div>
                <!-- CNPJ -->
                <div class="form-group col-md-3">
                    <label>CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="txtcnpj" value='<?php echo $dados['CNPJ'];?>'>
                </div>
                <!-- INSCRIÇÃO ESTADUAL -->
                <div class="form-group col-md-2">
                    <label>Inscrição estadual</label>
                    <input type="text" class="form-control" id="ie" name="txtie" value='<?php echo $dados['IE'];?>'>
                </div>
                <!-- ISENTO -->
                <div class="form-group col-md-1">
                    <label>Isento</label>
                    <!-- <input type="radio" class="form-control" id="isento" name="txtisento" value='<?php echo $dados['ISENTO'];?>'> -->
                    <select class="form-control" id="combo" name="txtisento">
                        <option><?php echo $dados['ISENTO'];?></option>
                        <option>...</option>
                        <option>Contribuente</option>
                        <option>Isento</option>
                    </select>
                </div>
                <!-- INSCRIÇÃO MUNICIPAL -->
                <div class="form-group col-md-2">
                    <label>Inscrição municipal</label>
                    <input type="text" class="form-control" id="im" name="txtim"  value='<?php echo $dados['IM'];?>'>
                </div>
                <!-- VENDEDOR / REPRESENTANTE -->
                <div class="form-group col-md-4">
                    <label>Vendedor / Representante</label>
                    <input type="text" class="form-control" id="vendedor" name="txtvendedor"  value='<?php echo $dados['vendedor'];?>'>
                </div>
                <!-- E-MAIL -->
                <div class="form-group col-md-3">
                    <label>E-MAIL</label>
                    <input type="email" class="form-control" id="email" name="txtemail"  value='<?php echo $dados['email'];?>'>
                </div>
                <!-- CELULAR -->
                <div class="form-group col-md-4">
                    <label>Celular</label>
                    <input type="text" class="form-control" id="celular" name="txtcelular"  value='<?php echo $dados['celular'];?>'>
                </div>
                <!-- TELEFONE 1 -->
                <div class="form-group col-md-4">
                    <label>TELEFONE 1</label>
                    <input type="text" class="form-control" id="telefone1" name="txttelefone1"  value='<?php echo $dados['telefone1'];?>'>
                </div>
                <!-- TELEFONE 2 -->
                <div class="form-group col-md-4">
                    <label>TELEFONE 2</label>
                    <input type="text" class="form-control" id="telefone2" name="txttelefone2"  value='<?php echo $dados['telefone2'];?>'>
                </div>
                <!-- CEP -->
                <div class="form-group col-md-2">
                    <label>CEP</label>
                    <input type="text" class="form-control" id="cep" name="txtcep"  value='<?php echo $dados['CEP'];?>'>
                </div>
                <!-- ENDEREÇO -->
                <div class="form-group col-md-4">
                    <label>Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="txtendereco"  value='<?php echo $dados['endereco'];?>'>
                </div>
                <!-- NÚMERO -->
                <div class="form-group col-md-1">
                    <label>Número</label>
                    <input type="text" class="form-control" id="numero" name="txtnumero"  value='<?php echo $dados['numero'];?>'>
                </div>
                <!-- COMPLEMENTO -->
                <div class="form-group col-md-5">
                    <label>Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="txtcomplemento"  value='<?php echo $dados['complemento'];?>'>
                </div>
                <!-- BAIRRO -->
                <div class="form-group col-md-5">
                    <label>Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="txtbairro"  value='<?php echo $dados['bairro'];?>'>
                </div>
                <!-- CIDADE -->
                <div class="form-group col-md-5">
                    <label>Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="txtcidade"  value='<?php echo $dados['cidade'];?>'>
                </div>
                <!-- ESTADO -->
                <div class="form-group col-md-2">
                    <label>Estado</label>
                    <input type="text" class="form-control" id="estado" name="txtestado"  value='<?php echo $dados['estado'];?>'>
                </div>
                <!-- SITE -->
                <div class="form-group col-md-4">
                    <label>Site</label>
                    <input type="text" class="form-control" id="site" name="txtsite"  value='<?php echo $dados['site'];?>'>
                </div>
                <!-- E-MAIL DE COBRANÇA PARA ENVIO XML -->
                <div class="form-group col-md-4">
                    <label>E-mail de cobrança para envio do XML</label>
                    <input type="email" class="form-control" id="emailcobranca" name="txtemail-cobranca"  value='<?php echo $dados['email_cobranca'];?>'>
                </div>
                <!-- DATA DE CADASTRO -->
                <div class="form-group col-md-4">
                    <label>Data de cadastro</label>
                    <input type="date" class="form-control" id="data-cadastro" name="txtdata-cadastro"  value='<?php echo $dados['data_cadastro'];?>'>
                </div>
                <!-- OBSERVAÇÕES -->
                <div class="form-group col-md-12">
                    <label>Observação</label>
                    <textarea class="form-control" rows="5" id="observacao" name="txtobservacao" id="observacao"><?php echo $dados['observacao'];?></textarea>
                </div>

                <br>
                <!-- chamando os botões para ações -->
                <div style="margin: auto;">
                    <button type="submit" name="btncal" class="btn btn-lg btn-primary">Salvar</button>
                    <!-- <button type="reset" name="btnlimpar" class="btn btn-lg btn-danger">limpar</button> -->
                    <button type="button" name="btnvoltar" onclick="javascript: location.href='cad_fornecedorLISTA.php';" class="btn btn-lg btn-default">voltar</button>
                </div>
   
            </div>
        </form>
    </section>

</body>
</html>