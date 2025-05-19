<?php

$servername = "localhost";
$username = "root";
$database = "login";
$password = "";

$conexao = mysqli_connect($servername, $username, $password, $database);

if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
}


// mysqli_close($conn); 


?>