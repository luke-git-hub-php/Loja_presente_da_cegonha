<?php include ('headerphp');?>
<br><br><br>
<br><br><br>
<br><br><br>
<br>
<?php
session_start();
session_destroy();
header("location:login_clientes.php");
?>
<?php include ('rodape.php');?>