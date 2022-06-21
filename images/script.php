<?php

$nombre= $_POST['Nombre'];
$mat= $_POST['Mat'];
$categoria= $_POST['Categoria'];
$jornada= $_POST['Jornada'];
$turno= $_POST['Turno'];
$adscripcion= $_POST['Adscripcion'];
$telefono= $_POST['Telefono'];



$servername = "sql303.byethost13.com";
$database = "b13_27471467_registro";
$username = "b13_27471467";
$password = "Warwick0510";


$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn) {
      		die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";



$sql = "REPLACE INTO tabla (nombre,matricula,categoria,jornada,turno,adscripcion,telefono) VALUES ('$nombre','$mat','$categoria','$jornada','$turno','$adscripcion','$telefono')";
	if (mysqli_query($conn, $sql)) {
      		echo "New record created successfully ";
} else {
     		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>


 
