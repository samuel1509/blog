<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales - TPF</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; color: #333; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        header { text-align: center; margin-bottom: 30px; }
        h1, h2 { color: #0056b3; }
        .personal-info { margin-bottom: 20px; }
        .personal-info img { max-width: 200px; height: auto; border-radius: 50%; display: block; margin: 0 auto 20px; border: 3px solid #0056b3; }
        nav { text-align: center; margin-bottom: 20px; }
        nav a { margin: 0 10px; text-decoration: none; color: #0056b3; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Datos Personales del Alumno</h1>
            <nav>
                <a href="index.php">Inicio del Blog</a>
                <a href="personal.php">Mis Datos Personales</a>
            </nav>
        </header>

        <div class="personal-info">
            <?php
            // Ruta a tu imagen personal. Asegúrate de que la imagen esté en /var/www/html/
            // Por ejemplo, si subes 'mi_foto.jpg' a /var/www/html/
            $imagen_personal = "mi_foto.jpg"; // ¡CAMBIA ESTO CON EL NOMBRE DE TU IMAGEN!
            ?>
            <img src="<?php echo $imagen_personal; ?>" alt="Foto del Alumno">

            <h2>Información sobre el Alumno</h2>
            <p><strong>Nombre Completo:</strong> CRISTIAN MANUEL APARICIO</p>
            <p><strong>Carrera:</strong> Ingenieria en Sistemas de Informacion</p>
            <p><strong>Universidad:</strong> Universidad Tecnológica Nacional, Facultad Regional Tucumán</p>
            <p><strong>TPF:</strong> Implementación de Servicio de Blog Personal en Ambiente Virtualizado (Proxmox LXC en Cloud UTN)</p>
            <p><strong>Objetivo del Blog:</strong> Compartir conocimientos, avances del proyecto y experiencias de aprendizaje.</p>
            <p>Este blog personal es parte del Trabajo Final Integrador para la asignatura de Virtualizacion de Servidores.</p>
        </div>
    </div>
</body>
</html>
