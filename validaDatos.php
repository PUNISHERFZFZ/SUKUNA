<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ajax";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "<br>"."Conexión exitosa" . "<br>";
echo "<br>";
echo "datos enviados." . "<br>";

if(isset($_POST["nombre"]) && isset($_POST["pass"]) && isset($_POST["estado"])){
    $nombre = $_POST["nombre"];
    $pass = $_POST["pass"];
    $estado = $_POST["estado"];
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
    


echo "El nombre es: " . $nombre . "<br>";
echo "La contraseña es: " . $pass . "<br>";
echo "Estado: " . $estado . "<br>";



$sql_check = "SELECT * FROM usuario WHERE nombre = '$nombre'";
$result_check = $conn->query($sql_check);



    if ($result_check->num_rows > 0) {
        echo "<br>";
        echo "El nombre existe en la base";
    } else {
        $sql_insert = "INSERT INTO usuario (nombre, pass) VALUES ('$nombre', '$pass_hash')";
        if ($conn->query($sql_insert) === true) {
            echo "realizada con exito ";
        } else {
            echo "Error : " . $conn->error;
        }
    }
   
}






?>