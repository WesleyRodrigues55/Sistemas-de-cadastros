<!DOCTYPE html>
<?php 
//faz a inclusão do banco
include("conexao.php");
//faz a inclusão da tabela de usuarios
include("usuarioBANCO.php");
//faz a inclusão da lógica feita para sessão
include("usuarioLOGICA.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <!-- CSS -->
    <style>
        html,
        body,
        #sessao {
            height: 100%;
            overflow-y: hidden;
            /* overflow-y: auto; */
        }
        
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background: url(background-body.png);
        }

        @media screen and (max-width: 700px) {
            body {
            background-image: url(fundo-mobile.png);
            }
        }
        
        #sessao {
            display: table;
            width: 100%;
        }
        
        #campo-sessao {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
        
        #style {
            /* border: 1px solid black; */
            margin: auto;
            width: 500px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }

        @media screen and (max-width:700px) {
            #style {
            /* border: 1px solid black; */
            margin: auto;
            width: 350px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }
        }
        
        #frm {
            text-align: center;
            margin: 30px;
            padding: 30px 30px;
        }
        
        h1 {
            margin: 10px 0 30px 0;
        }
        
        p {
            font-size: 16px;
            text-align: left;
            margin: 20px 0 0 0;
        }
        
        input {
            width: 300px;
            height: 30px;
        }
        
        button {
            width: 200px;
            height: 45px;
            margin: 20px 0 20px 0;
        }
        
        #barra {
            border-bottom: 1px solid black;
            opacity: 0.2;
            width: 100%;
        }
        
    </style>
</head>

<body>

    <div id="sessao">
        <div id="campo-sessao">
            <div id="style">
                <form method="post" class="form-group" name="frmLogin" id="frm">
                    <h1>Iniciar sessão</h1>
                    <p>Usuário</p>
                    <input type="text" class="form-control" name="usuario" id="input">
                    <p>Senha</p>
                    <input type="password" class="form-control" name="senha" id="input"><br>
                    <button type="submit" class="btn btn-primary" id="btnentrar" style="font-size: 18px">Entrar</button>
                    <br>
                    <h1 id="barra"></h1>
                    <h5><a href="">Esqueceu sua senha?</a></h5>

                            <?php 
    if ($_POST) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        //o primeiro passo é verificar se esse usuário existe no banco
        if (efetuaLogin($conexao,$usuario,$senha)) {
            usuarioLoga($usuario);
            header("Location: index.php");
        } else {
            $usuario = $_POST['usuario'];
            echo"<script>alert('Usuário ou senha incorretos');</script>";
        }
    }
    ?>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>