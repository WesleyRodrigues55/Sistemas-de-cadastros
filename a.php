
<script>
    function a() {
        var x = confirm("Deseja cadastrar?");
        if (x == true) {
            var x = <?php
// incluí a conexão com o banco
include("conexao.php");


// recebe os dados do formulário
$nome = $_POST['txtnome'];
$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];
$perfil = $_POST['txtperfil'];

// insere os dados obtidos no formulário pro banco
$sqlinsert = "insert into usuario values (0, '$nome', '$email', '$senha', '$perfil')";

// executando instrução SQL (para tratar erros)
// Diz que: se os inputs não receberem nenhum valor, dará um alerta de erro, caso conmtrário, um alerta de sucesso!
$resultado = @mysqli_query($conexao,$sqlinsert);
if (!$resultado) {
    die('Query Inválida: ' . @mysqli_error($conexao));
} else {
    echo "<br><br><br><h1>Registro cadastrado com sucesso!</h1>";
}

// fecha o mysql da variável conexão
mysqli_close($conexao);

// ATENÇÃO
// TODA VARIAVEL DE CONEXÃO ABERTA, TEM QUE FECHAR
?>

window.location.href = 'cad_usuarioLISTA.php';
        } else {
          window.location.href = 'cad_usuarioVIEW.php';
        }
    }
</script>
