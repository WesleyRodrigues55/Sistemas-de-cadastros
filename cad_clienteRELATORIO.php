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
  $sql = $pdo ->prepare("select * from cad_cliente order by nome");
  $sql ->execute();
 

  $pdf-> cell(19,1,"Relatorio de clientes",0,3,'C'); 
  $pdf-> cell(1,1,"ID",1,0,'C');
  $pdf-> cell(9,1,"Nome",1,0,'C');
  $pdf-> cell(5,1, "CPF", 1,0,'C');
  $pdf-> cell(4,1,"Celular",1,1,'C');
  
       
  foreach($sql as $resultado)
  {
      
	  $pdf-> cell(1,1,$resultado['id'],1,0,'C');
	  $pdf-> cell(9,1,utf8_decode($resultado['nome']),1,0,'C');
    $pdf-> cell(5,1, utf8_decode($resultado['CPF']),1,0, 'C');
    $pdf-> cell(4,1,utf8_decode($resultado['celular']),1,1,'C');
  }
  $pdf-> OutPut();