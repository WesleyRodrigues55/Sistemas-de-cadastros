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
    <title>Cadastro de clientes</title>

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

        section {
          margin-top: 160px;
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
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Clique aqui para consultar os clientes cadastrados"><a href="cad_clienteLISTA.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg></a><br><p>Lista de clientes cadastrados</p></button>
                </div>
            </div>
        </div>
    </nav>

    <!------- começo conteudo -------->
<section class="container card card-body">

<form method="post" action="cad_clienteCONEXAO.php">

<h1>Cadastro de clientes</h1>
<!-- INPUT NOME -->
<div class="row">
  <div class="form-group col-md-6">
    <label>Nome</label>
    <input type="text" class="form-control" id="nome" placeholder="Digite seu nome..." name="txtnome">
  </div>
<!-- INPUT SEXO -->
  <div class="form-group col-md-2">
    <label>sexo</label>
    <select class="form-control" name="txtsexo" id="combo">
    <option value="...">...</option>
      <option value="Masculino">M</option>
      <option value="Feminino">F</option>
    </select>
  </div>
<!-- INPUT ESTADO CIVIL -->
  <div class="form-group col-md-4">
    <label>Estado civil</label>
    <input type="text" class="form-control" id="text" placeholder="Digite seu estado civil..." name="txtestado-civil">
  </div>
<!-- INPUT PROFISSÃO -->
<div class="form-group col-md-6">
    <label>Profissão</label>
    <input type="text" class="form-control" id="profissao" placeholder="Digite seu estado civil..." name="txtprofissao">
</div>
<!-- INPUT DATA DE NASCIMENTO -->
<div class="form-group col-md-4">
    <label>Data de nascimento</label>
    <input type="date" class="form-control" id="date" name="txtdata">
</div>
<!-- INPUT CPF -->
<div class="form-group col-md-4">
    <label>CPF</label>
    <input type="text" class="form-control" id="CPF" placeholder="Digite seu CPF..." name="txtCPF">
</div>
<!-- INPUT RG -->
<div class="form-group col-md-4">
    <label>RG</label>
    <input type="text" class="form-control" id="RG" placeholder="Digite seu RG..." name="txtRG">
</div>
<!-- INPUT ENDEREÇO -->
<div class="form-group col-md-5">
    <label>Endereço</label>
    <input type="text" class="form-control" id="endereco" placeholder="Digite seu endereco..." name="txtendereco">
</div>
<!-- INPUT NÚMERO -->
<div class="form-group col-md-1">
    <label>Número</label>
    <input type="text" class="form-control" id="numero" placeholder="Digite seu numero..." name="txtnumero">
</div>
<!-- INPUT BAIRRO -->
<div class="form-group col-md-3">
    <label>Bairro</label>
    <input type="text" class="form-control" id="bairro" placeholder="Digite seu bairro..." name="txtbairro">
</div>
<!-- INPUT COMPLEMENTO -->
<div class="form-group col-md-3">
    <label>Complemento</label>
    <input type="text" class="form-control" id="complemento" placeholder="Digite seu complemento..." name="txtcomplemento">
</div>
<!-- INPUT CEP -->
<div class="form-group col-md-4">
    <label>CEP</label>
    <input type="text" class="form-control" id="CEP" placeholder="Digite seu CEP..." name="txtCEP">
</div>
<!-- INPUT UF -->
<div class="form-group col-md-1">
    <label>UF</label>
    <select class="form-control" name="txtUF" id="combo1">
    <option value="...">...</option>
      <option>SP</option>
      <option>RJ</option>
    </select>
</div>
<!-- INPUT CIDADE -->
<div class="form-group col-md-4">
    <label>Cidade</label>
    <input type="text" class="form-control" id="cidade" placeholder="Digite sua cidade..." name="txtcidade">
</div>
<!-- INPUT TELEFONE -->
<div class="form-group col-md-4">
    <label>Telefone</label>
    <input type="text" class="form-control" id="telefone" placeholder="Digite seu telefone(Opcional)..." name="txttelefone">
</div>
<!-- INPUT CELULAR -->
<div class="form-group col-md-4">
    <label>Celular</label>
    <input type="text" class="form-control" id="celular" placeholder="Digite seu celular..." name="txtcelular">
</div>
<!-- INPUT EMAIL -->
<div class="form-group col-md-4">
    <label>E-mail</label>
    <input type="email" class="form-control" id="email" placeholder="Digite seu email..." name="txtemail">
</div>
<!-- INPUT OBSERVAÇOES -->
<div class="form-group col-md-12">
    <label>Observações</label>
    <textarea type="text" class="form-control" rows="5" id="observacoes"  name="txtobservacoes"></textarea>
</div>

</div>
<br>
<button type="submit" name="btncal" class="btn btn-primary" >cadastrar</button>
<button type="button" name="btnvoltar" onclick="javascript: location.href='Index.php';" class="btn btn-danger">voltar</button>

</form>

</section>  
</body>
</html>