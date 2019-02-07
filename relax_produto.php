<?php

define('FPDF_FONTPATH', 'font/');
require('fpdf17/fpdf.php');
$pdf=new FPDF('L','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->SetFont('Arial','',14);
include('conexao.php');



 		//Logotipo
 		$pdf->Image('img/Logomakr_32QuiT.png',10,6,10);
 		//Arial bold 15
 		$pdf->SetFont('Arial','B',15);
 		//Mover para a direita
 		$pdf->Cell(80);
 		//título
 		$pdf->Cell(20,10,'Presente da Cegonha',6,0,'C');
 		//quebra de linha
 		$pdf->LN(20);



 
$pdf->SetTextColor(255,0,50);

$pdf->Cell(20,3,'Produtos', 1,1,'C');
	$pdf->SetTextColor(255,0,50);
 $query_r=mysqli_query($conexao, "select id_prod from produtos");
 $id_cat=$_POST['sel_cat'];
 $query=mysqli_query($conexao,"Select * from itens_venda where id_prod='$id_cat'");
while($resultado=mysqli_fetch_assoc($query)){
$pdf->Cell(10,1,'Produto:'.$resultado['nome_prod'],1,0,'C');	
$pdf->Cell(10,1,'Qtd:'.$resultado['qtd'],1,0,'C');	
$pdf->Cell(10,1,'Data:'.substr($resultado['data_compra'], 8, 2) . " / ". substr($resultado['data_compra'], 5, 2) . " / ". substr($resultado['data_compra'], 0, 4),1,1,'C');
}
/*$query_p=mysqli_query($conexao, "Select nome_prod from itens_venda");
while($resultado=mysqli_fetch_assoc($query_p)){
$pdf->Cell(10,1,'Produto:'.$resultado['nome_prod'],1,1,'C');	


}*/
/*$query_p="Select i.nome_prod,p.estoque FROM produtos AS  p JOIN itens_venda AS i ON p.id_cat='$id_cat' ";
$sql=mysqli_query($conexao,$query_p);
while($resultado=mysqli_fetch_assoc($sql)){

$pdf->Cell(10,1,'Produto:'.$resultado['nome_prod'],1,0,'C');	
$pdf->Cell(10,1,'Estoque: '.$resultado['estoque'],1,1,'C');

}*/

$pdf->SetFont('Arial' ,'', 12);
$pdf->Text(100,50,'odair');
$pdf->Output();

?>
<?php/*

define('FPDF_FONTPATH', 'font/');
require('fpdf/fpdf.php');
include('conexao.php');
$pdf=new FPDF('L','cm','A4');
 class PDF extends FPDF {
 	//topo da página
 		function Header(){
 		//Logotipo
 		$pdf->Image('img/Logomakr_32QuiT.png',10,6,10);
 		//Arial bold 15
 		$pdf->SetFont('Arial','B',15);
 		//Mover para a direita
 		$pdf->Cell(80);
 		//título
 		$pdf->Cell(20,10,'SBFILMES - Dados do clientes',6,0,'C');
 		//quebra de linha
 		$pdf->LN(20);
 	//rodapé da página
 	function Footer(){
 		//Posiçã´em 1.5 cm de baixo
 		$this->SetY(-15);
 		//Ariel italic 8
 		$this->SetFont('Arial','I',8);
 		//Número de página
 		$this->Cell(0,12,'Página '. $this->PageNo() . '/{nb}',0,0,'C');
 	}
 }
//Instanciação de class herdada
 $pdf=new PDF();
 $pdf->AliasNbPages();
 $pdf->addPage();
 $pdf->SetFont('Times','',12);
 $id_venda=$_POST['sel_clientes'];
 //Contéudo do PDF
 $resultado= mysqli_query($conecta, "SELECT * FROM itens_venda WHERE id=$id_venda");
 while($linha=mysqli_fetch_assoc($resultado)){
       $pdf->Cell(0,10,'Produto : '.$linha['nome_prod'],0,1);
        
 }
 
 $pdf->Output();*/
?>
