<?php
include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterado com sucesso</title>
        <!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- JS para animações -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>

<?php
    include_once("conexao.php");

    $id = $_POST['txtid'];
    $nome = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $senha = $_POST['txtsenha'];
    $perfil = $_POST['txtperfil'];

    //UPDATE nessa linha da tabela
    $sqlupdate = "update usuario set nome='$nome', email='$email', perfil='$perfil' where id=$id";

    //instruções SQL
    $resultado = @mysqli_query($conexao, $sqlupdate);
    if (!$resultado) {
        echo '<input type="button" onclick="window.location='."'index.php'".';"value="Voltar"><br><br>';
        die ('<h4>Query inválida:</h4>' . @mysqli_error($conexao));
    } else {
        echo "<script>alert('Registro alterado com sucesso!');</script>";
    }

    //fechando conexao com banco
    mysqli_close($conexao);

?>

<body onload="alterar()">
<script>
    function alterar() {
        window.location.href = 'cad_usuarioLISTA.php';
    }
</script>    
</body>
</html>