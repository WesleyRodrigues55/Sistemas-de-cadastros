<!DOCTYPE html>
<?php
include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();
?>
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
$sexo = $_POST['txtsexo'];
$estadoCivil = $_POST['txtestadoCivil'];
$profissao = $_POST['txtprofissao'];
$dataNasc = $_POST['txtdata'];
$CPF = $_POST['txtCPF'];
$RG = $_POST['txtRG'];
$endereco = $_POST['txtendereco'];
$numero = $_POST['txtnumero'];
$bairro = $_POST['txtbairro'];
$complemento = $_POST['txtcomplemento'];
$CEP = $_POST['txtCEP'];
$UF = $_POST['txtUF'];
$cidade = $_POST['txtcidade'];
$telefone = $_POST['txttelefone'];
$celular = $_POST['txtcelular'];
$email = $_POST['txtemail'];
$observacoes = $_POST['txtobservacoes'];


    $sqlupdate = "update cad_cliente set nome='$nome', sexo='$sexo', estadoCivil='$estadoCivil', profissao='$profissao', data_nasc='$dataNasc', CPF='$CPF', RG='$RG', endereco='$endereco', numero='$numero', bairro='$bairro', complemento='$complemento', CEP='$CEP', UF='$UF', cidade='$cidade', telefone='$telefone', celular='$celular', email='$email', observacoes='$observacoes' where id=$id";

//instruções SQL
$resultado = @mysqli_query($conexao,$sqlupdate);
if (!$resultado) {
    echo '<input type="button" onclick="window.location='."'index.php'".';"value="Voltar"><br><br>';
    die ('<h4>Query inválida:</h4>' . @mysqli_error($conexao));
} else {
    echo "<script>alert('Registro alterado com sucesso!');</script>";
}

//fechando conexao com banco
mysqli_close($conexao);

?>

<body onload="alterado()">
<script>
    function alterado() {
        window.location.href = 'cad_clienteLISTA.php';
    }
</script>
    
</body>
</html>