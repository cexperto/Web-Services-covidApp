<?php
$mysqli = new mysqli("remotemysql.com","95w8aOMoTo","hsrKz2niTA","95w8aOMoTo");

if($mysqli->connect_errno){
    echo "No es posible hacer conexion";
    exit;
}

$user=$_GET['user'];
$pass=$_GET['pass'];
//$user="user";
//$pass="pass";


$consulta="SELECT user, pass FROM users WHERE user='$user' AND pass='$pass'";
$resulta=$mysqli -> query($consulta);
	
	/* si hay algun registro*/
    
    if(mysqli_num_rows($resulta)>0){
        
        /* se Obtiene una fila de resultados  */
        $rowsresult=mysqli_fetch_array($resulta);
        
       echo 'ok';
       
        
    }
    /* si no hay resultados */
    else{
        
        echo 'mal';
    }

	mysqli_close($mysqli);


?>