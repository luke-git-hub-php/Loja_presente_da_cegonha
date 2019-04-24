<?php 
if(!empty($_GET["foto"]))
{
?>
<img src="<?php echo $_GET["foto"]; ?>" width="90" height="90"><br>
<a href="#" onClick="ajax('carrinho.php?produto=<?php echo $_GET["produto"]; ?>','carrinho')">Adicionar a Lista</a>
<?php }
else
{
echo "erro";
}
?>