<?php
include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();


include("conexao.php");

$id_entrada = $_GET ['id_entrada'];
$id_prod = $_GET ['codigo'];
$qtd = $_GET ['qtd'];
$preco = $_GET ['preco'];

$sqlinsert = "insert into itens_entrada values (0, '$id_entrada', '$id_prod', '$qtd', '$preco')";

$resultado = @mysqli_query($conexao, $sqlinsert);

    if (!$resultado) {
        die('Query Inválida: ' . @mysqli_error($conexao));  
    } else {
        header('Location: entradaView.php');
    } 
    mysqli_close($conexao);
?>