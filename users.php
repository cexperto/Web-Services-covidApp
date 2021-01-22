<?php
$mysqli = new mysqli("remotemysql.com","95w8aOMoTo","hsrKz2niTA","95w8aOMoTo");

if($mysqli->connect_errno){
    echo "No es posible hacer conexion";
    exit;
}

$pass = $_POST['user'];
$user = $_POST['pass'];

$consulta="SELECT user FROM users WHERE user='$user'";
$resulta=$mysqli -> query($consulta);

if(mysqli_num_rows($resulta)>0){
        echo "Este usuario ya esta regisrado";
    }
    /* si no hay resultados */
    else{
    $query = "INSERT INTO users(user,pass)VALUES ('$user','$pass')";
    echo "ok";
    mysqli_query($mysqli,$query) or die ("Problemas al insertar".mysqli_error($mysqli));
    }







?>