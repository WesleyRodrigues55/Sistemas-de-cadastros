
<?php
//inicia a asessão de login
session_start();

//funções

//caso o usuário esteja logado
function usuarioEstaLogado() {
    return isset($_SESSION["usuario_logado"]);
}

//verifica o usuário
function verificaUsuario() {
    if(!usuarioEstaLogado()) {
        header("Location: usuarioERRO.php");
        die();
    }
}

//Quando o usuário estiver logado
function usuarioLogado() {
    return $_SESSION["usuario_logado"];
}

//Quando o usuário loga
function usuarioLoga($email) {
    $_SESSION["usuario_logado"] = $email;
    return $_SESSION["usuario_logado"];
}

//Quando o usuário sai da aplicação
function logout() {
    session_destroy();
}

?>