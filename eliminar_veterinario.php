<?php
include 'crud.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Preparar la consulta de eliminación
    $query = "DELETE FROM veterinario WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);

    // Ejecutar la consulta de eliminación
    $eliminacion_exitosa = $stmt->execute();

    // Verificar si la eliminación fue exitosa
    if ($eliminacion_exitosa) {
        header("Location: dashboard_admin.php");
    } else {
        // Imprimir mensaje de error en caso de fallo
        echo 'Error al eliminar el veterinario.';
    }
} else {
    // Redirigir si no se accedió mediante POST
    header("Location: dashboard_admin.php");
    exit();
}
?>
