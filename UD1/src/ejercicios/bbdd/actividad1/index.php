<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuarios</title>
</head>

<body>
    <a href="./registro.php">Rexistrarse</a>
    <a href="./login.php">Iniciar sesión</a>
    
    <?php
        if (isset($_SESSION["id_usuario"])) {
            echo "<a href='./cerrar.php'>Cerrar sesión</a>";
        }
        else {
            echo "Non hai ningunha sesión iniciada.";
        }

    ?>
</body>

</html>