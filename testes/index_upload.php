<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<?/*php if (isset($_POST['upload'])) {
	 $pasta= 'uploads/';
	 $permitido= array('image/jpg' ,'image/jpeg' ,'image/pjpeg'  );
	 $img =$_FILES['img'];
	 $tmp= $img['tmp_name'];
	 $name=$img['name'];
	 $type=$img['type'];
	 require('funcao_upload.php');
}*/
?>

</head>
<body>
<h1>upload</h1>
<form action="funcao_upload.php" method="post" enctype="multipart/form-data" name="upload">
<input type="file" name="arquivo">
		<input type="submit"  name="upload" value="Salvar">
</form>
	<br><br>
	<?php
	$arquivos= glob ('uploads/*.*');
         $qtd = 3;
         $atual=(isset($_GET['pg'])) ? intval($_GET['pg']):1;
        $pagarquivo = array_chunk($arquivos, $qtd);
        $contar = count($pagarquivo);
        $result=$pagarquivo[$atual-1];
	?>
	<?php
        foreach ($result as $value) {
        	printf('<img src="%s" width="150" height="100" />', $value);

        }
        echo "<hr/>";
 for($i =1; $i<=$contar; $i++){
 	if($i==$atual){
     printf('<a href="#">(%s)</a>', $i, $i);
 	}else
 	printf('<a href="?pg=%s"> %s </a>', $i, $i);
 }
	?>
</body>
</html>
