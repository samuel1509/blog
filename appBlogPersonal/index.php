<?php
// Configuración de la Base de Datos (¡Asegúrate de que estas IPs y credenciales sean las correctas!)
$servername = "172.16.90.107"; // IP de tu dbserver-lxc
$username = "Cristian"; // Tu usuario de MariaDB para el blog
$password = "782508"; // ¡CAMBIA ESTA CONTRASEÑA!
$dbname = "db_blog_personal"; // La base de datos que creaste para el blog

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida a la base de datos: " . $conn->connect_error);
}




// --- Lógica para añadir un nuevo post ---
$mensaje_post = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_post"])) {
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $contenido = $conn->real_escape_string($_POST['contenido']);

    $sql = "INSERT INTO posts (titulo, contenido) VALUES ('$titulo', '$contenido')";

    if ($conn->query($sql) === TRUE) {
        $mensaje_post = "<div class='alert alert-success' role='alert'>¡Post agregado exitosamente!</div>";
    } else {
        $mensaje_post = "<div class='alert alert-danger' role='alert'>Error al agregar el post: " . $conn->error . "</div>";
    }
}

// --- Lógica para eliminar un post ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_post"])) {
    $post_id = intval($_POST['post_id']); // Asegúrate de que es un entero para seguridad

    $sql = "DELETE FROM posts WHERE id = $post_id";

    if ($conn->query($sql) === TRUE) {
        $mensaje_post = "<div class='alert alert-success' role='alert'>¡Post eliminado exitosamente!</div>";
    } else {
        $mensaje_post = "<div class='alert alert-danger' role='alert'>Error al eliminar el post: " . $conn->error . "</div>";
    }
}

// --- HTML y Contenido del Blog ---
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mi Blog Personal - TPF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 30px; margin-bottom: 30px; }
        .post { border-bottom: 1px solid #e9ecef; padding-bottom: 15px; margin-bottom: 20px; }
        .post:last-child { border-bottom: none; }
        .post-meta { font-size: 0.9em; color: #6c757d; }
        .add-post-form { background-color: #e9ecef; padding: 20px; border-radius: 0.25rem; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <header class="text-center mb-4">
            <h1 class="display-4">Mi Blog Personal</h1>
            <nav class="nav justify-content-center">
                <a class="nav-link" href="index.php">Inicio del Blog</a>
                <a class="nav-link" href="personal.php">Mis Datos Personales</a>
            </nav>
        </header>

        <section class="mb-5">
            <h2 class="mb-3">Últimas Entradas</h2>
            <?php
            // ¡Asegúrate de seleccionar también el 'id' para poder eliminar posts!
            $sql = "SELECT id, titulo, contenido, fecha_publicacion FROM posts ORDER BY fecha_publicacion DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card mb-3'>";
                    echo "<div class='card-body'>";
                    echo "<h3 class='card-title'>" . htmlspecialchars($row["titulo"]) . "</h3>";
                    echo "<p class='card-subtitle mb-2 text-muted'>Publicado el: " . $row["fecha_publicacion"] . "</p>";
                    echo "<p class='card-text'>" . nl2br(htmlspecialchars($row["contenido"])) . "</p>";

                    // --- Formulario para eliminar el post ---
                    echo "<form method='post' action='index.php' onsubmit='return confirm(\"¿Estás seguro de que quieres eliminar este post?\\nEsta acción es IRREVERSIBLE.\");'>";
                    echo "<input type='hidden' name='post_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' name='delete_post' class='btn btn-danger btn-sm mt-2'>Eliminar</button>";
                    echo "</form>";
                    // --- Fin del formulario de eliminar ---

                    echo "</div></div>";
                }
            } else {
                echo "<p class='text-muted'>No hay entradas de blog para mostrar.</p>";
            }
            ?>
        </section>

        <hr class="my-5">

        <section>
            <h2 class="mb-3">Agregar Nueva Entrada</h2>
            <?php echo $mensaje_post; ?>
            <div class="add-post-form">
                <form method="post" action="index.php">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido:</label>
                        <textarea class="form-control" id="contenido" name="contenido" rows="8" required></textarea>
                    </div>
                    <button type="submit" name="submit_post" class="btn btn-primary">Publicar Entrada</button>
                </form>
            </div>
        </section>

        <?php $conn->close(); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
