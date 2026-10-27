<?php 

function getConexion(){
        return $conexion = new mysqli("db", "usuarioBD", "abc123", "mi_base_de_datos");
}

function addCliente(string $nombre, string $telf){
    
    $conexion = getConexion();

    // establecer conexión coa base de datos usando hostname, usuario, contraseña e o nome da db

    if (!$conexion) {
        echo "Error de conexion";
        die();
    }
    
    $sql = "INSERT INTO clientes (nombre, telefono) VALUES (?, ? )";
    
    



    
}