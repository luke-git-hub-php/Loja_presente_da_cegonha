<?php 
if(!empty($_GET["produto"]))
{
$arquivo=fopen("carrinho.txt","a");
fwrite($arquivo,"$_GET[produto] \n");
fclose($arquivo);
}
?>