<?php
if(!empty($_GET["produto"]))
{
$arquivo=fopen("carrinho.txt","a");
$produto=$_GET["produto"];
fwrite($arquivo,"$produto <Br>");
fclose($arquivo);

}
$file=file("carrinho.txt");
$cont=count($arquivo);
if($cont>0)
{
?>
<table width="250" border="0" bgcolor="#f7f7f7">
  <tr align="center" bgcolor="#0099CC"> 
    <td colspan="3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Carrinho 
      de Compras</strong></font></td>
  </tr>
  <tr align="center"> 
    <td width="50"><strong><font size="1">ORDEM</font></strong></td>
    <td width="150" align="left"><strong><font size="1">DESCRICAO </font></strong></td>
    <td width="50"><strong><font size="1">QTDE</font></strong></td>
  </tr>
  <?
for ($i=0;$i<$cont;$i++)
{
$novo=$i+1;
echo "<tr><td>&nbsp;</td><td><font size=1 face=verdana color=red ><b>$file[$i]</font></b></td><td>&nbsp;</td></tr>";
?>
  <tr align="center"> 
    <td colspan="3" bgcolor="#0099CC"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></strong><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></strong><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Desenvolvido 
   <?PHP $rand=rand(1,12); ?>
    <a href="#" onClick="ajax('meus_dados.php','produto<?php echo $rand; ?>')">  por Alexandre Oliveira</a></font></strong></td>
  </tr>
  <?php
}


?>
</table>
<?php 
}
else
{
echo "CESTA VAZIA...";
}
?>
