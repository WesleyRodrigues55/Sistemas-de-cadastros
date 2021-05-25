<?php
include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();

if ($_GET['txtcliente'] == '...' || $_GET['txtobs'] == '') {
    echo "<script>alert('Preencha os campos');</script>";
    echo "<script> window.location = 'cad_vendasVIEW.php';</script>";
} else {

include("conexao.php");

$nome = $_GET['txtcliente'];
$obs = $_GET['txtobs'];

//variavel para insert
$sqlinsert="insert  into venda_produto values (0, '$nome', now(), '$obs')";

// variavel que consulta no banco a conexao e o insert
$resultado = @mysqli_query($conexao, $sqlinsert);

// verificação
if (!$resultado) {
    die('Query Inválida: ' . @mysqli_error($conexao));  
} else {
    header('Location: cad_vendaprodutoVIEW.php');
} 

//fechando a conexao
mysqli_close($conexao);
}
?>