<?php

class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $base_de_datos = "veterinaria";
    private $conexion;

    // Constructor
    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->base_de_datos}";
            $this->conexion = new PDO($dsn, $this->usuario, $this->contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo "Error de conexión: " . $ex->getMessage();
        }
    }

    // Método para obtener el nombre del administrador
    public function obtenerNombreAdmin() {
        try {
            $query = "SELECT Nombre, Rol FROM user WHERE Rol = 'admin' LIMIT 1";
            $stmt = $this->conexion->query($query);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result;
            } else {
                return "Admin no encontrado";
            }
        } catch (PDOException $ex) {
            echo "Error al obtener el nombre del administrador: " . $ex->getMessage();
        }
    }
}

?>
