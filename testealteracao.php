<!DOCTYPE html>
<html lang="pt-br">
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
    
<head>
	<title>Alteracao de Usuarios</title>
</head>

<body>
<h2> <p> Alteracao de Usuarios</h2>
<?php
	include_once('conexao.php');

	$sqlconsulta =  'select * from tipo_usuario';
	$resultado = @mysqli_query($conexao, $sqlconsulta);
	
	
	function listarUsuario($conexao){ 
		
		$listadeusuarios = array();
		$resultado = mysqli_query($conexao,"select * from tipo_usuario");
	
		while($usuario = mysqli_fetch_assoc($resultado)){
			array_push($listadeusuarios, $usuario);         
		}   
	
		return $listadeusuarios;
		
	}
	
	$listausu = listarUsuario($conexao);
	
	// recuperando 
	$codigo = $_GET['codigo'];

	// criando a linha do  SELECT
	$sqlconsulta =  "select * from usuario where id = '$codigo'";

	// executando instru��o SQL
	$resultado = @mysqli_query($conexao, $sqlconsulta);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Invalida:</b>' . @mysqli_error($conexao)); 
	} else {
		$num = @mysqli_num_rows($resultado);
		if ($num==0){
		echo "<b>Codigo: </b>nao localizado !!!!<br><br>";
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		exit;
		}else{
			$dados=mysqli_fetch_array($resultado);
		}
	} 
	mysqli_close($conexao);
?>
<form name="usuario" action="alterar.php" method="post">
	<b>Codigo:</b> <input type="number" name="txtcodigo" value='<?php echo $dados['id']; ?>' readonly><br><br>
	<b>Usuario:</b> <input type="text" name="txtnome" maxlength='80' style="width:550px" value='<?php echo $dados['nome']; ?>'><br><br>
	<b>Email:</b> <input type="text" name="txtemail" maxlength='80' style="width:550px" value='<?php echo $dados['email']; ?>'><br><br>
	<b>Senha: </b> <input type="password" name="txtsenha" maxlength='80' style="width:550px"  value='<?php echo $dados['senha']; ?>'><br><br>
	<b>Perfil: </b> <input type="text" name="txtperfil" value='<?php echo $dados['perfil']; ?>'><br><br>
	<select class="form-control" name="meu_select" >

<!-- ---------------------------------------------------------------- -->

	    <option value="<?echo $dados['id'];?>"><?php echo $dados['perfil'];?></option>
          <?php foreach($listausu as $uso ) { ?>
           <option value="<?echo $uso['id'];?>"><?php echo $uso['descricao'];?></option>
           <?php } ?>
<!-- ---------------------------------------------------------------- -->

</select>
<br>
	<input type="submit" value="Ok">
	<input type="reset" value="Limpar">
	<input type='button' onclick="window.location='index.php';" value="Voltar">
</form>
</body>
</html>
