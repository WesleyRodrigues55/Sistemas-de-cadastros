
<?php

include_once("conexao.php");

$id = $_POST['txtid'];

$sqldelete = "delete from cad_produto where id=$id";

$resultado = @mysqli_query($conexao,$sqldelete);
if (!$resultado) {
    echo '<input type="button" onclick="window.location='."'index.php'".';"value="Voltar"><br><br>';
    die ('<h4>Query inválida:</h4>' . @mysqli_error($conexao));
} else {
    echo "<script>alert('Registro apagado com sucesso!');</script>";
}


//fechando conexao com banco
mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load</title>
    <script>
    function voltar(){
        window.location.href = 'cad_produtoLISTA.php';
    }
    </script>
</head>
<body onload="voltar()">
    
</body>
</html>
