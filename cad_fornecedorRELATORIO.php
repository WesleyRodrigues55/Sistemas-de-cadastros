<?php
include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();

  define ('FPDF_FONTPATH', 'font/');
  require ('PDF/fpdf.php');
  
  
  $pdf = new FPDF ('L','cm','A4');
  
  $pdf->AddPage();
  $pdf-> SetFont('Arial','B','12');
  $pdo = new PDO ('mysql:host=localhost; dbname=ds','root','');
  $sql = $pdo ->prepare("select * from cad_fornecedor order by razao_social");
  $sql ->execute();
 

  $pdf-> cell(27,1,utf8_decode("Relatório de fornecedores"),0,3,'C'); 
  $pdf-> cell(1,1,"ID",1,0,'C');
  $pdf-> cell(7,1,utf8_decode("Razão social"),1,0,'C');
  $pdf-> cell(4,1, "CNPJ", 1,0,'C');
  $pdf-> cell(6,1,"Email",1,0,'C');
  $pdf-> cell(4,1,"Data de cadastro",1,0,'C');
  $pdf-> cell(5,1,"Obs",1,1,'C');
  
       
  foreach($sql as $resultado)
  {
      
	$pdf-> cell(1,1,$resultado['id'],1,0,'C');
	$pdf-> cell(7,1,utf8_decode($resultado['razao_social']),1,0,'C');
    $pdf-> cell(4,1,utf8_decode($resultado['CNPJ']),1,0, 'C');
    $pdf-> cell(6,1,utf8_decode($resultado['email']),1,0,'C');
    $pdf-> cell(4,1,utf8_decode($resultado['data_cadastro']),1,0,'C');
    $pdf-> cell(5,1,utf8_decode($resultado['observacao']),1,1,'C');
  }
  $pdf-> OutPut();