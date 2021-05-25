
<?php

//Função feita para realizar/efetuar o login
function efetuaLogin($conexao, $email, $senha) {
    //da um select no banco com o email e senha
    $query = "select * from usuario where email='{$email}' and senha='{$senha}'";

    //essa variavel faz com que o select e a conexao com o banco funcione
    $resultado = mysqli_query($conexao, $query);

    //faz a verificação se existe algo no banco
    $usuarioLogado = mysqli_fetch_assoc($resultado);

    //retorna a variavel usuarioLogado e seu valor
    return $usuarioLogado;
}

?>