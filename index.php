<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM usuarios";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Registro de usuarios</title>
</head>

<body>
  <div class="row">
    <col-md-12>
    <div class="users-form">
        <hr>
        <h1>Contacto</h1>
        <form action="insert_user.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required maxlength="50" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ ]+" title="El nombre solo puede contener letras y espacios.">
        <input type="email" name="email" placeholder="Email" required maxlength="50">
        <input type="text" name="telefono" placeholder="Teléfono" required pattern="\d{10,15}">
        <input type="submit" value="Enviar">
        </form>
    </div>
</col-md-12>
<hr>
<div class="col-md-12">
<div class="users-table">
        <h2>Usuarios registrados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['nombre'] ?></th>
                        <th><?= $row['email'] ?></th>
                        <th><?= $row['telefono'] ?></th>
                        <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="text-warning" ><i class="fa-solid fa-trash"></i></a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
       
    </div>
</div>
  </div>

    

</body>

</html>