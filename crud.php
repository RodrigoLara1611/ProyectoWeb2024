<?php
include 'config.php';

function getVeterinarios() {
    global $conn;
    $query = "SELECT * FROM veterinario";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getVeterinarioByCedula($cedula) {
    global $conn;
    $query = "SELECT * FROM veterinario WHERE Cedula = :cedula";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':cedula', $cedula);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getVeterinarioById($id) {
    global $conn;
    $query = "SELECT * FROM veterinario WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>