<?php

include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();

  define ('FPDF_FONTPATH', 'font/');
  require ('PDF/fpdf.php');
  
  
  $pdf = new FPDF ('P','cm','A4');
  
  $pdf->AddPage();
  $pdf-> SetFont('Arial','B','12');
  $pdo = new PDO ('mysql:host=localhost; dbname=ds','root','');
  $sql = $pdo ->prepare("select * from cad_produto order by descricao");
  $sql ->execute();
 

  $pdf-> cell(19,1,"Relatorio de produtos",0,3,'C'); 
  $pdf-> cell(1,1,"ID",1,0,'C');
  $pdf-> cell(8,1,utf8_decode("Descrição"),1,0,'C');
  $pdf-> cell(7,1, "Quantidade", 1,0,'C');
  $pdf-> cell(3,1,utf8_decode("Preço"),1,1,'C');
  
       
  foreach($sql as $resultado)
  {
      
	  $pdf-> cell(1,1,$resultado['id'],1,0,'C');
	  $pdf-> cell(8,1,utf8_decode($resultado['descricao']),1,0,'C');
    $pdf-> cell(7,1, utf8_decode($resultado['quantidade']),1,0, 'C');
    $pdf-> cell(3,1,utf8_decode("R$ " . $resultado['preco']),1,1,'C');
  }
  $pdf-> OutPut();