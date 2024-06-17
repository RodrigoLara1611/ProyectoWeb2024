<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="./CSS/styleDashboardA.css" rel="stylesheet">
</head>

<body>

    <?php
    include 'database.php';
    $database = new Database();

    $datosAdmin = $database->obtenerNombreAdmin();
    $nombreAdmin = $datosAdmin['Nombre'];
    $rolAdmin = $datosAdmin['Rol'];
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_doctor'])) {
        header("Location: formu.html");
        exit();
    }
    ?>

    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo.jpg" alt="Logo" height="70">
            </a>
            <span class="navbar-text">
                <h2>Programacion Web</h2>
            </span>

            <div class="dropdown-container">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo "Bienvenido " . $rolAdmin . ": " . $nombreAdmin; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar Sesión</a></li>
                    </ul>
                    <div class="dropdown-bar"></div>
                </div>
            </div>
        </div>
    </nav>

    <div class="conte">
        <h2> Doctores</h2>
    </div>

    <div class="container">
        <form method="post">
            <input type="submit" name="agregar_doctor" value="Agregar nuevo doctor">
        </form>

        <!-- Tabla de es -->
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Consultorio</th>
                    <th>Cédula</th>
                    <th>Detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'crud.php';

                $veterinarios = getVeterinarios();
                foreach ($veterinarios as $veterinario) {
                    echo "<tr>";
                    echo "<td>{$veterinario['id']}</td>";
                    echo "<td>{$veterinario['nombre']}</td>";
                    echo "<td>{$veterinario['apellido']}</td>";
                    echo "<td>{$veterinario['especialidad']}</td>";
                    echo "<td>{$veterinario['consultorio']}</td>";
                    echo "<td>{$veterinario['cedula']}</td>";
                    echo "<td><a href='detalles_veterinario.php?id={$veterinario['id']}'><img src='img/detalles.png' alt='Detalles' width='40' height='auto'></a></td>";
                    echo "<td><a href='#' class='btn btn-primary btn-edit' data-bs-toggle='modal' data-bs-target='#editVeterinarioModal' data-id='{$veterinario['id']}' data-nombre='{$veterinario['nombre']}' data-apellido='{$veterinario['apellido']}' data-especialidad='{$veterinario['especialidad']}' data-consultorio='{$veterinario['consultorio']}' data-cedula='{$veterinario['cedula']}'><img src='img/editar.png' alt='Editar' width='40' height='auto'></a></td>";
                    echo "<td><form method='POST' action='eliminar_veterinario.php' class='formu'onsubmit='return confirm(\"¿Estás seguro de que deseas eliminar este veterinario?\");'><input type='hidden' name='id' value='{$veterinario['id']}'><button type='submit' class='btn btn-link'><img src='img/eliminar.png' alt='Eliminar' width='40' height='auto'></button></form></td>";
                    echo "</tr>";
                } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
