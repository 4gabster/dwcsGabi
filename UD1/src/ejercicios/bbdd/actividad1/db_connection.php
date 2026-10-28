<?php

function conectarBD()
{
    $host    = 'db';
    $dbname  = 'videoxogos';
    $username = 'root';
    $password = 'root';
    $charset  = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    $options = [
        // Lanza excepciones automáticas ante errores SQL
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        // Devuelve los resultados como arrays asociativos por defecto (ej: $usuario['nombre'])
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // Desactiva la emulación de consultas preparadas para mayor seguridad contra Inyección SQL
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $username, $password, $options);
        return $pdo;
    } catch (\PDOException $e) {

        die("Error en la conexión a la base de datos: " . $e->getMessage());
        error_log($e->getMessage());
    }
}


function rexistrarUsuarios($pdo)
{
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = trim($_POST['nombreUser'] ?? $_POST['nombre'] ?? '');
        $apel1 = trim($_POST['apel1'] ?? '');
        $apel2 = !empty($_POST['apel2']) ? trim($_POST['apel2']) : null;
        $email = trim($_POST['email'] ?? '');
        $passwordPlana = $_POST['password'] ?? '';

        if (empty($nombre) || empty($apel1) || empty($email) || empty($passwordPlana)) {
            die("Error: Faltan campos obligatorios por completar.");
        }

        // Tratamiento do contrasinal
        $passwordHash = password_hash($passwordPlana, PASSWORD_DEFAULT);

        $primeiraNombre = mb_substr($nombre, 0, 1);
        $nicUser = mb_strtolower($primeiraNombre . $apel1);

        $sql = "INSERT INTO usuarios (nombre, apellido_1, apellido_2, nic_usuario, correo_electronico, contrasena_hash) 
            VALUES (:nombre, :apellido_1, :apellido_2, :nic_usuario, :correo_electronico, :contrasena_hash)";

        try {
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido_1", $apel1);
            $stmt->bindParam(":apellido_2", $apel2);
            $stmt->bindParam(":nic_usuario", $nicUser);
            $stmt->bindParam(":contrasena_hash", $passwordHash);
            $stmt->bindParam(":correo_electronico", $email);

            $stmt->execute();

            $_SESSION["id_usuario"] = $pdo->lastInsertId();

            header("Location: index.php");
            exit();


            echo "<h2>Usuario registrado con éxito</h2>";
            echo "<p>Nic de usuario asignado: <strong>" . htmlspecialchars($nicUser) . "</strong></p>";
            echo '<p><a href="index.php">Volver al formulario</a></p>';
        } catch (\PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                echo "Error: Ya existe un usuario con ese correo o nic.";
            } else {
                echo "Error al registrar el usuario: " . htmlspecialchars($e->getMessage());
            }
            echo '<p><a href="index.php">Volver al formulario</a></p>';
        }
    }
}

function loginUsuarios($pdo)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nic = trim($_POST["nic"]);
        $passwordPlana = trim($_POST["password"]);

        $sql = "SELECT * FROM usuarios WHERE nic_usuario = :nic_usuario";

        try {
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":nic_usuario", $nic);

            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_OBJ);

            if ($usuario) {
                $passwordHash = $usuario->contrasena_hash;

                if (password_verify($passwordPlana, $passwordHash)) {
                    unset($passwordPlana);

                    session_start();
                    $_SESSION["usuario"] = $usuario;

                    header("Location: index.php");
                    exit();
                } else {
                    echo "Usuario o contraseña incorrectos.";
                }
            } else {
                echo "Usuario o contraseña incorrectos.";
            }
        } catch (\PDOException $e) {
            echo "ERROR na base de datos: " . $e->getMessage();
        }
    }
}


                        
                        
function datosXogosAll($pdo)
{
    $sql = "SELECT * FROM videojuegos";

    try {
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (\PDOException $e) {
        echo "ERRO na base de datos: " . $e->getMessage();
    }
}


// function eliminarXogo($)