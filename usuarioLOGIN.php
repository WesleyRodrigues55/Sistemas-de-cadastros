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
            /* background-color: rgba(91, 91, 245, 0.5); */
            background-image: url("fundo-body.png");
            background-attachment: fixed;
            color: black;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
            /* border: 1px solid rgb(129, 129, 129); */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
            width: 300px;
            height: 400px;
            margin: auto;
            /* background-color: rgba(68, 245, 24, 0.1); */
            background: rgb(255, 255, 255);
        }
        
        h1 {
            padding-top: 40px;
        }
        
        #frm {
            margin-top: 20px;
            margin: 20px;
            
        }
        
        #input {
            margin: 0 20px 10px 20px;
            height: 30px;
            width: 210px;
            border-radius: 20px;
            border: 0 none;
            border-bottom: 1px solid black;
            background-color: rgba(90, 88, 88, 0.1);
            outline: 0;
            color: black;
        }
        
        p {
            font-size: 16px;
        }
        
        p>a {
            color: rgb(27, 149, 224);
            text-decoration: none;
        }

        p>a:hover {
            color: rgb(27, 149, 224);
            text-decoration: underline ;
        }
        
        #btnentrar {
            padding: 10px;
            margin-top: 20px;
            background-color: rgb(27, 149, 224);;
            border: none;
            border-radius: 20px;
            width: 150px;
            color: white;
        }
        
        #btnentrar:hover {
            background-color: rgb(27, 149, 204);;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div id="sessao">
        <div id="campo-sessao">
            <div id="style">
                <div id="style1">
                    <div id="style2">
                        <h1>Entrar no sistema</h1>
                        <form method="post" name="frmLogin" id="frm">
                            <p>Usuário</p>
                            <input type="text" name="usuario" id="input">
                            <p>Senha</p>
                            <input type="password" name="senha" id="input"><br>
                            <input type="submit" value="Entrar" id="btnentrar">
                            <hr color="rgba(241, 235, 235, 0.2)" size="1px" width="80%" style="opacity: 0.2; margin-top: 20px">
                            <p><a href="">Esqueceu sua senha?</a></p>

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
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>