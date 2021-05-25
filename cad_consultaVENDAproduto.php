<?php
include("usuarioLOGICA.php");
//verifica se foi logado ou não
verificaUsuario();

include("conexao.php");

$id_venda = $_GET ['id_venda'];
//verificação para mostra descricao do produto
$consulta = "SELECT cad_produto.id, cad_produto.descricao, itens_venda.id_venda, itens_venda.id_produto, itens_venda.quantidade, itens_venda.preco FROM cad_produto, itens_venda WHERE itens_venda.id_venda = $id_venda and itens_venda.id_produto = cad_produto.id";  
$con = @mysqli_query($conexao,$consulta) or die($mysqli -> error); 

//fazendo select para exibição do total da venda
$preco = "SELECT sum(preco * quantidade) as total FROM itens_venda where id_venda = $id_venda";  

$con_preco = @mysqli_query($conexao,$preco) or die($mysqli -> error); 
$total = mysqli_fetch_array($con_preco);
 
// selecionado o cliente
$nome_cli = "select venda_produto.id_cliente, cad_cliente.nome from venda_produto, cad_cliente where venda_produto.id = $id_venda and venda_produto.id_cliente = cad_cliente.id";

$cliente = @mysqli_query($conexao,$nome_cli) or die($mysqli -> error); 
$dado_cli = mysqli_fetch_array($cliente);
?>

<!DOCTYPE html> 
    <html> 
        <head> 
        <title>Consulta vendas</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- JS para animações -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

        </head> 

        <body> 

            <div class="row">
                <div class="col-md-12">
                    <table id="grid_cadastro" class="table">
                        <div class="box">
                            <label>Código</label><br>
                            <input type="text" name="txtcodigo" value='<?php echo $dado_cli['id_cliente']; ?>' readonly>
                            <br><br>
                            <label>Nome Cliente</label><br>
                            <input type="text" name="txtdesc" maxlength='80' style="width:550px" value='<?php echo $dado_cli['nome']; ?>'readonly>
                            <br><br>
                            <label>Total da Venda</label><br>
                            <input type="number" name="txttotal" maxlength='20' style="width:80px" value='<?php echo number_format($total['total'],2); ?>'readonly>
                            <br><br>
                        </div>

                        <thead class="thead-dark">      

                            <tr> 
                                <td>Produto</td> 
                                <td>Preço</td>           
                                <td>Qtd</td>          
                                <td>Total</td>
                            </tr> 

                        </thead>

                        <?php while($dados = $con->fetch_array()) { ?> 

                            <tr> 
                                <td><?php echo $dados['descricao']; ?></td> 
                                <td><?php echo $dados['preco']; ?></td>           
                                <td><?php echo $dados['quantidade']; ?></td>            
                                <td><?php echo number_format($dados['preco'] * $dados['quantidade'],2); ?></td>           
                                <td></td> 
                            </tr> 

                        <?php } ?> 

                    </table> 
                </div>
            </div>
        </body> 
    </html>