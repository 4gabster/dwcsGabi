<?php
require "db_connection.php";
session_start();

$pdo = conectarBD();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuarios</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 480px;
        }

        .card h2 {
            margin-bottom: 24px;
            color: #333333;
            text-align: center;
            font-size: 24px;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #555555;
            font-weight: 600;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .form-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Registrar Usuario</h2>

        <?php if (!empty($mensaje)): ?>
            <div class="alert-error">
                <p><?= $mensaje ?></p>
            </div>
        <?php endif; ?>

        <form method="POST" action="registro.php">
            <div class="form-group">
                <label for="formnombre">Nombre:</label>
                <input type="text" name="nombreUser" id="formnombre" required>
            </div>

            <div class="form-group">
                <label for="formApel1">Primer Apellido:</label>
                <input type="text" name="apel1" id="formApel1" required>
            </div>

            <div class="form-group">
                <label for="formApel2">Segundo Apellido:</label>
                <input type="text" name="apel2" id="formApel2">
            </div>

            <div class="form-group">
                <label for="formEmail">Correo Electrónico:</label>
                <input type="email" name="email" id="formEmail" required>
            </div>

            <div class="form-group">
                <label for="formPassword">Contraseña:</label>
                <input type="password" name="password" id="formPassword" required>
            </div>

            <button type="submit" class="btn-submit">Registrar Usuario</button>
        </form>

        <?php rexistrarUsuarios($pdo); ?> 
        <div class="form-footer">
            <p><a href="index.php">Volver a Inicio</a></p>
        </div>
    </div>

</body>

</html>