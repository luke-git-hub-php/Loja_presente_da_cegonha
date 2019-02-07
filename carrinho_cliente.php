<?php session_start(); if(!isset($_SESSION['carrinho_cliente'])){ 
	$_SESSION['carrinho_cliente'] = array(); } 
 if(isset($_GET['acao'])){ if($_GET['acao'] == 'add'){ $id = intval($_GET['id']); 
 if(!isset($_SESSION['carrinho_cliente'][$id])){ $_SESSION['carrinho_cliente'][$id] = 1; }else{ $_SESSION['carrinho_cliente'][$id] += 1; } } if($_GET['acao'] == 'del'){ $id = intval($_GET['id']); 
 if(isset($_SESSION['carrinho_cliente'][$id])){ unset($_SESSION['carrinho_cliente'][$id]); } } 
  if($_GET['acao'] == 'up_c'){ if(is_array($_POST['prod'])){
   foreach($_POST['prod'] as $id => $qtd){
                      $id  = intval($id);
                      $qtd = intval($qtd);
                         if(!empty($qtd) || $qtd <> 0){
                         $_SESSION['carrinho_cliente'][$id] = $qtd;
                      }else{
                         unset($_SESSION['carrinho_cliente'][$id]);
                      }
                     
                   }
                }
             }
           
          }
           
           
    ?>
    <?php

if(isset($_SESSION['venda'])){
}else{
  $_SESSION['venda']= array();
}

if(isset($_GET['par'])){
  $produto = $_GET['par'];
  $_SESSION['venda'][$produto] = 1;
}
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
  
    <?php include("header.php");?>
    <?php include("conexao.php");?>
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Carrinho de compras</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>

    </head>
 
    <body>
     
<table class="table table-striped table-bordered table-condensed table-hover" >
         
<caption>Carrinho de Compras</caption>
 
 
<thead>
 
<tr class="success">
                 
<th width="244">Produto</th>
 
 
<th width="10" >Quantidade</th>
 
 
<th width="89">Pre&ccedil;o</th>
 
 
<th width="100">SubTotal</th>
 
 
<th width="4">Remover</th>
 
              </tr>
 
        </thead>
 
 
<form action="?acao=up_c" method="post">
 

<tfoot>
                
<tr>
                 
<td colspan="1"><input type="submit" value="Atualizar Carrinho" /></td>
 
 

                 
<td colspan="1"><a href="index_carrinho_cliente.php">Continuar Comprando</a></td><br>
 
 <td colspan="2"><a href="logout_carrinho.php"><input type="submit" value="finalizar Compras" name="enviar"  onclick="<?php cadastrar()?>" /></a></td>
 
    
  
    
 </tr>
        </tfoot>
 
 
<tbody>
  
                   <?php
                         if(count($_SESSION['carrinho_cliente']) == 0){
                            echo '
<tr>
<td colspan="5">Não há produto no carrinho</td>
</tr >

 
';
                         }else{
                 include("conexao.php");
                             $total = 0;
                            foreach($_SESSION['carrinho_cliente'] as $id => $qtd){
                                  $sql   = "SELECT *  FROM produtos WHERE id_prod= '$id' ";
                                  $qr    = mysqli_query($conexao, $sql) or die(mysqli_error());
                                  $ln    = mysqli_fetch_assoc($qr);
                                   
                                  $nome  = utf8_encode($ln['nome_prod']);
                                      $i  = $ln['id_cat'];
                                  $preco = number_format($ln['preco'], 2, ',', '.');
                                  $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                               $data= date("d/m/Y");
 
                                  $total += $ln['preco'] * $qtd;
                          if(isset($_POST['enviar'])){
 $sqlup=mysqli_query($conexao, "update produtos set estoque=estoque - '$qtd' where id_prod='$id' ");    
$SqlInserirVenda= mysqli_query($conexao, "insert into  venda(id,valor,data_compra) VALUES('','$total','$data') ");
   $idVenda= mysqli_insert_id($conexao);

$SqlInserirItens =mysqli_query($conexao, "insert into itens_venda(id_venda,id,id_prod,nome_prod,qtd,id_cat,data_compra)VALUES('$idVenda' ,'','$id','$nome','$qtd','$i','$data') ");
echo "<script language='javascript' type='text/javascript'>
    alert('Compra Realizada com Sucesso!');window.location.href='logout_carrinho.php';
  </script>";

}
 

                               echo '
<tr>       
                                      
<td class="info">'.$nome.'</td>


<td><input type="number" size="3"  name="prod['.$id.']" value="'.$qtd.'" /></td>
 
 
<td class="danger">R$ '.$preco.'</td>
 
 
<td>R$ '.$sub.'</td>
 
 
<td class="warning"><a href="?acao=del&id='.$id.'">X</a></td>
 
                                  </tr>
 
';
                            }
                               $total = number_format($total, 2, ',', '.');
                               echo '
<tr>
                                         
<td colspan="4" class="danger">Total</td>
 
 
<td class="danger">R$ '.$total.'</td>
 
                                  </tr>
 
';
                         }
    
                   ?>
         <?php  function cadastrar() {

if(isset($_POST['enviar'])){
   $SqlInserirVenda= mysqli_query($conexao, "insert into  venda(id ,valor) VALUES('','$total') ");
   $idVenda= mysqli_insert_id();
   foreach($_SESSION['carrinho'] as $prod => $qtd):
           $SqlInserirItens =mysqli_query($conexao ,"insert into itens_venda(id_venda,id,id_prod,nome_prod,qtd)VALUES('$idVenda' ,'','$id'  ,'$prod','$qtd') ");
    endforeach;
   echo 'F';

}
 
   }
?>


         </tbody>
 
            </form>
 
   
    </table>

 <?php include("rodape.php");?>
    </body>
    </html>