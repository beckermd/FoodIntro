<?php



$db_host= "127.0.0.1"; //mysqli No acepta localhost
$db_user= "root";
$db_password= "";
$db_name= "Recipe";
 $db_name2="Registration";
// Create connection
$mysqli= new mysqli($db_host,$db_user,$db_password,$db_name); //ahora creo un objeto conexion

// Check connection
if ($mysqli->connect_errno)//en vez de la funcion llamo a un metodo en el objeto $con
{
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}


