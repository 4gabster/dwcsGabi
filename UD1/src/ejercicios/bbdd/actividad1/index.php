<?php
require "db_connection.php";
session_start();

$pdo = conectarBD();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuarios</title>
    <!-- Enlazamos el archivo CSS externo -->
    <link rel="stylesheet" href="styles/stylesidx.css">
</head>

<body>

    <div class="nav-links">
        <?php
        if (isset($_SESSION["usuario"])) {
            $usuario = $_SESSION["usuario"];
            echo "<span class='estado-sesion'>Ola, <strong>$usuario->nombre</strong></span>";
            echo "<a href='./cerrar.php'>Cerrar sesión</a>";
            $xogos = datosXogosAll($pdo);
        } else {
            echo "<span class='estado-sesion'>Non hai ningunha sesión iniciada.</span>";
            echo "<a href='./registro.php'>Rexistrarse</a>";
            echo "<a href='./login.php'>Iniciar sesión</a>";
        }
        ?>
    </div>

    <?php if (!empty($xogos)) { ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Plataforma</th>
                    <th>Ano de lanzamento</th>
                    <th>Xénero</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($xogos as $xogo) { ?>
                    <tr>
                        <td><?= htmlspecialchars($xogo->id) ?></td>
                        <td><?= htmlspecialchars($xogo->nombre) ?></td>
                        <td><?= htmlspecialchars($xogo->plataforma) ?></td>
                        <td><?= htmlspecialchars($xogo->anio_lanzamiento) ?></td>
                        <td><?= htmlspecialchars($xogo->genero) ?></td>
                        <td><a href="./altamodificacion.php?id=<?=$xogo->id?>">Modificar</a></td>
                        <td><a href="./altamodificacion.php?modificacion">Eliminar</a></td>
                        </tr>
                    
                <?php } ?>
            </tbody>
            <tfoot>
                <td colspan="7">
                    <a href="./altamodificacion.php" class="enlace-completo">Dar de alta</a>
                </td>
                
            </tfoot>
        </table>
    <?php } ?>

</body>

</html>