<?php

include("connection.php");
$con = connection();

$id = null;

$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
$telefono = mysqli_real_escape_string($con, $_POST['telefono']);
$email = mysqli_real_escape_string($con, $_POST['email']);

// Validaciones

// Validación del nombre
if (!preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑ ]+$/', $nombre)) {
    die("El nombre solo puede contener letras y espacios.");
}
if (strlen($nombre) > 50) {
    die("El nombre es demasiado largo. Debe tener menos de 50 caracteres.");
}

// Validación del correo electrónico
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("El correo electrónico no es válido.");
}

// Verificar si el correo electrónico ya existe en la base de datos
$sql_check_email = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($con, $sql_check_email);

if (mysqli_num_rows($result) > 0) {
    die("El correo electrónico ya está registrado.");
}

// Validación del teléfono
if (!preg_match('/^\d{10,15}$/', $telefono)) {
    die("El número de teléfono debe tener entre 10 y 15 dígitos y solo contener números.");
}

$sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre',  '$email', '$telefono')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>