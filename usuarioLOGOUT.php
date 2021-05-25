
<?php 

//inclui a lógica do usuário
include("usuarioLOGICA.php");

//faz o logout da aplicação<?php

logout();

//quando finalizar sessão leva o usuário na página de login
header("Location: usuarioLOGIN.php");
?>