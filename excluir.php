<?php

include('conexao.php');
include('header.php');
$id = $_GET['id'];
mysqli_query($conexao, ("DELETE FROM produtos WHERE id_prod ='$id' "));
echo '<meta charset=UTF-8>
<script> alert("Registro excluído")</script>';
echo "<script>
window.location=\"cadastro_produtos.php\"
</script>
";

include('rodape.php');
?>