<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagado com sucesso</title>
        <!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- JS para animações -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>
<body style="text-align:center;">

<?php
include_once("conexao.php");

$id = $_POST['txtid'];
$descricao = $_POST['txtdescricao'];
$quant = $_POST['txtquant'];
$preco = $_POST['txtpreco'];
$lote = $_POST['txtlote'];
$data = $_POST['txtdata'];
$codBarras = $_POST['txtcodBarras'];
$fornecedor = $_POST['txtfornecedor'];

$sqlupdate = "delete from cad_produto where id=$id";

//instruções
$resultado = @mysqli_query($conexao,$sqlupdate);
if (!$resultado) {
    echo'<input type="button" onclick=window.location='."'index.php'".';"value=Voltar"><br><br>';
    die ('<h4>Query inválida: </h4>' . @mysqli_error($conexao));
} else {
    echo "<br><br><br><h1>Registro excluido com sucesso</h4>";
}

mysqli_close($conexao);

?>

<div class="container">
    
    <!-- um botão para voltar ao index depois que o cadastro for feito -->
    <button type="button" class="btn btn-danger" style="width: 100px; height: 50px;" onclick="window.location='index.php';" value="Voltar"><svg style="margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/><span>Voltar</span>
    </svg>
    </button>

</div>
    
</body>
</html>