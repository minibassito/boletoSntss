<?php


$nombre= $_POST['Nombre'];
$mat= $_POST['Mat'];
$categoria= $_POST['Categoria'];
$jornada= $_POST['Jornada'];
$turno= $_POST['Turno'];
$adscripcion= $_POST['Adscripcion'];
$telefono= $_POST['Telefono'];


$servername = "localhost";
$database = "registro";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn) {
      		die("Connection failed: " . mysqli_connect_error());
}
 
//echo "Connected successfully";



$sql = "INSERT INTO tabla (nombre,matricula,categoria,jornada,turno,adscripcion,telefono) VALUES ('$nombre','$mat','$categoria','$jornada','$turno','$adscripcion','$telefono')";
		
	if (mysqli_query($conn, $sql)) {
      		//echo "<br>New record created successfully<br>";
} else {
     		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);



require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('images/sntss.png',10,20,22);
$pdf->SetFont('Arial','B','16');
$pdf->Cell(30,5,'SINDICATO NACIONAL DE TRABAJADORES DEL SEGURO SOCIAL');
$pdf->Ln('10');
$pdf->SetFont('Arial','B','14');
$pdf->Cell(180,5,'SECCION XXV CDMX',0,0,'C');
$pdf->Ln('10');
$pdf->SetFont('Arial','B','14');
$pdf->Cell(180,5,'SECRETARIA DE PREVISION SOCIAL',0,0,'C');
$pdf->Ln('20');
$pdf->SetFont('Arial','B','12');
$pdf->Cell(30,5,'CLAUSULA 146 C.C.T.');
$pdf->Cell(150,5,'ADQUISICION DE AUTOMOVILES',0,0,'R');
$pdf->Ln('20');
$pdf->Cell(180,10,'FECHA  '.date('d/m/Y'),0,0,'R');
$pdf->Ln('20');
$pdf->Ln('20');
$pdf->Cell(90,10,utf8_decode('Nombre: '.$nombre),0,0,'L',0);
$pdf->Ln('20');
$pdf->Cell(90,10,utf8_decode('Categoría:  '.$categoria),0,0,'L',0);
$pdf->Ln('20');
$pdf->Cell(90,10,utf8_decode('Matrícula:  '.$mat),0,0,'L',0);
$pdf->Ln('20');
$pdf->Cell(90,10,utf8_decode('Jornada: '.$jornada),0,0,'L',0);
$pdf->Ln('20');
$pdf->Cell(90,10,utf8_decode('Turno:  '.$turno),0,0,'L',0);
$pdf->Ln('20');
$pdf->Cell(90,10,utf8_decode('Adscripción:  '.$adscripcion),0,0,'L',0);


$pdf->Output();

move_uploaded_file($_FILES['userfile']['tmp_name'],'tarjetones/'.$nombre.'.pdf');

exit();

?>


 
