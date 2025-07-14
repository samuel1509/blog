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
        $mensaje_post = "<p style='color: green;'>¡Post agregado exitosamente!</p>";
    } else {
        $mensaje_post = "<p style='color: red;'>Error al agregar el post: " . $conn->error . "</p>";
    }
}

// --- HTML y Contenido del Blog ---
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Blog Personal - TPF</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; color: #333; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        header { text-align: center; margin-bottom: 30px; }
        h1, h2 { color: #0056b3; }
        .post { border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px; }
        .post:last-child { border-bottom: none; }
        .post h3 { margin-bottom: 5px; color: #333; }
        .post-meta { font-size: 0.9em; color: #777; margin-bottom: 10px; }
        .add-post-form { background-color: #e9e9e9; padding: 20px; border-radius: 5px; margin-top: 30px; }
        .add-post-form input[type="text"], .add-post-form textarea {
            width: calc(100% - 22px); padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px;
        }
        .add-post-form input[type="submit"] {
            background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;
        }
        .add-post-form input[type="submit"]:hover { background-color: #218838; }
        nav { text-align: center; margin-bottom: 20px; }
        nav a { margin: 0 10px; text-decoration: none; color: #0056b3; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Mi Blog Personal</h1>
            <nav>
                <a href="index.php">Inicio del Blog</a>
                <a href="personal.php">Mis Datos Personales</a>
            </nav>
        </header>

        <h2>Últimas Entradas</h2>
        <?php
        $sql = "SELECT titulo, contenido, fecha_publicacion FROM posts ORDER BY fecha_publicacion DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h3>" . htmlspecialchars($row["titulo"]) . "</h3>";
                echo "<p class='post-meta'>Publicado el: " . $row["fecha_publicacion"] . "</p>";
                echo "<p>" . nl2br(htmlspecialchars($row["contenido"])) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay entradas de blog para mostrar.</p>";
        }
        ?>

        <hr>

        <h2>Agregar Nueva Entrada</h2>
        <?php echo $mensaje_post; ?>
        <div class="add-post-form">
            <form method="post" action="index.php">
                <label for="titulo">Título:</label><br>
                <input type="text" id="titulo" name="titulo" required><br><br>
                <label for="contenido">Contenido:</label><br>
                <textarea id="contenido" name="contenido" rows="8" required></textarea><br><br>
                <input type="submit" name="submit_post" value="Publicar Entrada">
            </form>
        </div>

        <?php $conn->close(); ?>
    </div>
</body>
</html>
