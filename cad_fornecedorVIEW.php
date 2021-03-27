<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de fornecedores</title>

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
          margin-bottom: 50px;
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
                    <button type="buttom" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Clique aqui para consultar os fornecedores cadastrados"><a href="cad_fornecedorLISTA.php"><svg xmlns="http://www.w3.org/2000/svg" id="icone" width="30" height="30" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
                <path d="M14.12 10.163l1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
                <path d="M14.12 6.576l1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
            </svg></a><br><p>Lista de fornecedores cadastrados</p></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- COMEÇO DO CONTEÚDO -->

    <section class="container card card-body">
        <form method="post" action="cad_fornecedorCONEXAO.php">
            <h1>Cadastro de fornecedor</h1>

            <div class="row">
                <!-- RAZAO SOCIAL -->
               <div class="form-group col-md-6">
                    <label>Razão social</label>
                    <input type="text" class="form-control" id="razao" name="txtrazao" placeholder="Digite a razão social...">
                </div>   
                <!-- DATA-ABERTURA -->
                <div class="form-group col-md-3">
                    <label>Data abertura</label>
                    <input type="date" class="form-control" id="data-abertura" name="txtdata-abertura">
                </div>
                <!-- TIPO -->
                <div class="form-group col-md-3">
                    <label>Tipo</label>
                    <select class="form-control" id="combo" name="txttipo">
                        <option>...</option>
                        <option>SP</option>
                    </select>
                </div>
                <!-- REGIME TRIBUTÁRIO -->
                <div class="form-group col-md-2">
                    <label>Rigimes tributários</label>
                    <select class="form-control" id="combo2" name="txtregime">
                        <option>...</option>
                        <option>Simples nacional</option>
                        <option>Lucro presumido</option>
                        <option>Lucro real</option>
                </select>
                </div>
                <!-- CNPJ -->
                <div class="form-group col-md-4">
                    <label>CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="txtcnpj" placeholder="Digite seu CNPJ...">
                </div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- INSCRIÇÃO ESTADUAL -->
                <div class="form-group col-md-3">
                    <label>Inscrição estadual</label>
                    <input type="text" class="form-control" id="ie" name="txtie" readonly="" placeholder="Digite a inscrição estadual...">
                </div>
                <!-- ISENTO -->
                <div class="form-group col-md-1">
                    <label>Isento</label>
                    <br>
                    <!-- <select class="form-control" id="combo" name="txtisento"> -->
                    <input type="checkbox" name="txtisento" value="sim" id="editar" />
                </div>
                <!-- INICIO JS -->
                <script>
                    var editar = document.getElementById("editar");
                    // No click verifico se o editar esta marcado e desativo os 
                    // readOnly dos inputs type text
                    editar.addEventListener("click", function() {
                        if (this.checked) {
                            toggleReadOnly(true);
                        } else {
                            toggleReadOnly(false);
                        }
                    });

                    function toggleReadOnly(bool) {
                        var inputs = document.getElementsByTagName("input");
                        for (var i = 0; i < inputs.length; i++) {
                            if (inputs[i].id === "ie") {
                                inputs[i].readOnly = bool;
                            }
                        }
                    }
                </script>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- INSCRIÇÃO MUNICIPAL -->
                <div class="form-group col-md-2">
                    <label>Inscrição municipal</label>
                    <input type="text" class="form-control" id="im" name="txtim" placeholder="Digite a inscrição municipal...">
                </div>
                <!-- VENDEDOR / REPRESENTANTE -->
                <div class="form-group col-md-6">
                    <label>Vendedor / Representante</label>
                    <input type="text" class="form-control" id="vendedor" name="txtvendedor" placeholder="Digite o nome do vendedor ou representante...">
                </div>
                <!-- E-MAIL -->
                <div class="form-group col-md-6">
                    <label>E-MAIL</label>
                    <input type="email" class="form-control" id="email" name="txtemail" placeholder="Digite um e-mail para contato...">
                </div>
                <!-- CELULAR -->
                <div class="form-group col-md-4">
                    <label>Celular</label>
                    <input type="text" class="form-control" id="celular" name="txtcelular" placeholder="Digite o número de celular...">
                </div>
                <!-- TELEFONE 1 -->
                <div class="form-group col-md-4">
                    <label>TELEFONE 1</label>
                    <input type="text" class="form-control" id="telefone1" name="txttelefone1" placeholder="Digite um telefone...">
                </div>
                <!-- TELEFONE 2 -->
                <div class="form-group col-md-4">
                    <label>TELEFONE 2</label>
                    <input type="text" class="form-control" id="telefone2" name="txttelefone2" placeholder="Digite um segundo telefone(Opcional)...">
                </div>
                <!-- CEP -->
                <div class="form-group col-md-2">
                    <label>CEP</label>
                    <input type="text" class="form-control" id="cep" name="txtcep" placeholder="Digite seu CEP...">
                </div>
                <!-- ENDEREÇO -->
                <div class="form-group col-md-4">
                    <label>Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="txtendereco" placeholder="Digite seu endereço...">
                </div>
                <!-- NÚMERO -->
                <div class="form-group col-md-1">
                    <label>Número</label>
                    <input type="text" class="form-control" id="numero" name="txtnumero" placeholder="...">
                </div>
                <!-- COMPLEMENTO -->
                <div class="form-group col-md-5">
                    <label>Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="txtcomplemento" placeholder="Digite um complemento(Opcional)...">
                </div>
                <!-- BAIRRO -->
                <div class="form-group col-md-5">
                    <label>Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="txtbairro" placeholder="Digite o bairro...">
                </div>
                <!-- CIDADE -->
                <div class="form-group col-md-5">
                    <label>Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="txtcidade" placeholder="Digite a cidade...">
                </div>
                <!-- ESTADO -->
                <div class="form-group col-md-2">
                    <label>Estado</label>
                    <input type="text" class="form-control" id="estado" name="txtestado" placeholder="Digite o estado...">
                </div>
                <!-- SITE -->
                <div class="form-group col-md-4">
                    <label>Site</label>
                    <input type="text" class="form-control" id="site" name="txtsite" placeholder="Digite um site de contato(Opcional)...">
                </div>
                <!-- E-MAIL DE COBRANÇA PARA ENVIO XML -->
                <div class="form-group col-md-4">
                    <label>E-mail de cobrança para envio do XML</label>
                    <input type="email" class="form-control" id="emailcobranca" name="txtemail-cobranca" placeholder="Digite um e-mail de cobrança para envio do XML...">
                </div>
                <!-- DATA DE CADASTRO -->
                <div class="form-group col-md-4">
                    <label>Data de cadastro</label>
                    <input type="date" class="form-control" id="data-cadastro" name="txtdata-cadastro" placeholder="Digite a data de cadastro...">
                </div>
                <!-- OBSERVAÇÕES -->
                <div class="form-group col-md-12">
                    <label>Observação</label>
                    <textarea class="form-control" rows="5" id="observacao" name="txtobservacao" id="observacao"></textarea>
                </div>

                <div class="col-md-12" style="text-align:center;">
                <button type="submit" name="btncal" class="btn btn-primary" >cadastrar</button>
                
                <button type="button" name="btnvoltar" onclick="javascript: location.href='Index.php';" class="btn btn-danger">voltar</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>