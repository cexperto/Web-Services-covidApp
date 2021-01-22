<?php
$mysqli = new mysqli("remotemysql.com","95w8aOMoTo","hsrKz2niTA","95w8aOMoTo");

if($mysqli->connect_errno){
    echo "No es posible hacer conexion";
    exit;
}

$nombre = $_POST['nombres'];
$correo = $_POST['correo'];
$pregunta1 = $_POST['pregunta1'];
$pregunta2 = $_POST['pregunta2'];
$pregunta3 = $_POST['pregunta3'];
$pregunta4 = $_POST['pregunta4'];
$pregunta5 = $_POST['pregunta5'];
$pregunta6 = $_POST['pregunta6'];
$pregunta7 = $_POST['pregunta7'];
$pregunta8 = $_POST['pregunta8'];

$query = "INSERT INTO encuesta
(nombres,correo,pregunta1,pregunta2,pregunta3,
pregunta4,pregunta5,pregunta6,pregunta7,pregunta8 )
VALUES ('$nombre','$correo','$pregunta1','$pregunta2','$pregunta3','$pregunta4',
'$pregunta5','$pregunta6','$pregunta7','$pregunta8')";



mysqli_query($mysqli,$query) or die ("Problemas al insertar".mysqli_error($mysqli));




?>