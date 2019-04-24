<?
//RECEBE
//PARÂMETRO 
$id = $_GET["id"];

//CONECTA
$conn = mysqli_connect("localhost", "root",
"", "loja_presente_da_cegonha ") 
or die("Erro na conexão com o BD");

//EXIBE
//IMAGEM 
$sql = mysqli_query($conn, "SELECT imagem FROM
produtos WHERE id = ".$id."");

$row = mysqli_fetch_array($sql,
MYSQLI_ASSOC); 
$tipo = $row["tipo"]; 
$bytes = $row["foto"];

//EXIBE
//IMAGEM 
header("Content-type: ".$tipo."");

echo $bytes;
?>