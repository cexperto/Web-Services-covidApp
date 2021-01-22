<?php
header("Content-Type: application/json");

$mysqli = new mysqli("remotemysql.com","95w8aOMoTo","hsrKz2niTA","95w8aOMoTo");

if($mysqli->connect_errno){
    echo "No es posible hacer conexion";
    exit;
}


$sql = "SELECT * FROM encuesta";

mysqli_set_charset($mysqli, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($mysqli, $sql)) die();

$encuesta = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
    $id=$row['id'];
    $nombres=$row['nombres'];
    $correo=$row['correo'];
    $pregunta1=$row['pregunta1'];
    $pregunta2=$row['pregunta2'];
    $pregunta3=$row['pregunta3'];
    $pregunta4=$row['pregunta4'];
    $pregunta5=$row['pregunta5'];
    $pregunta6=$row['pregunta6'];
    $pregunta7=$row['pregunta7'];
    $pregunta8=$row['pregunta8'];
      

    $encuesta[] = array('id'=> $id, 
                        'nombres'=> $nombres,
                        'correo'=> $correo,
                        'pregunta1'=> $pregunta1,
                        'pregunta2'=> $pregunta2,
                        'pregunta3'=> $pregunta3,
                        'pregunta4'=> $pregunta4,
                        'pregunta5'=> $pregunta5,
                        'pregunta6'=> $pregunta6,
                        'pregunta7'=> $pregunta7,
                        'pregunta8'=> $pregunta8);

}
    
$json_string = json_encode($encuesta);
echo $json_string;


$result->free();




?>
