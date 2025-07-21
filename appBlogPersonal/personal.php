<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Datos Personales - TPF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 30px; margin-bottom: 30px; }
        .personal-info img { max-width: 200px; height: auto; border-radius: 50%; display: block; margin: 0 auto 20px; border: 3px solid #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <header class="text-center mb-4">
            <h1 class="display-4">Datos Personales del Alumno</h1>
            <nav class="nav justify-content-center">
                <a class="nav-link" href="index.php">Inicio del Blog</a>
                <a class="nav-link" href="personal.php">Mis Datos Personales</a>
            </nav>
        </header>

        <section class="text-center">
            <div class="personal-info">
                <?php
                // Ruta a tu imagen personal. Asegúrate de que la imagen esté en /var/www/html/
                $imagen_personal = "https://scontent.ftuc1-2.fna.fbcdn.net/v/t1.6435-1/189738148_4540838595931876_7641290427501574182_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=109&ccb=1-7&_nc_sid=e99d92&_nc_eui2=AeFkk2nGeUmmA1q2fQizZpPgWXkQqYIRRSJZeRCpghFFIhE65ark6NHv4PyZJnnNuzwSV54VkIQuPYMFSndo5ixo&_nc_ohc=jJ4hYusifqEQ7kNvwFDWN4G&_nc_oc=AdkfK05Ii5c1MkR_Z1i6S3exOP2AjKYwoCzebL0Dyc0hbYhF9QLUT4RhMAqx2b-lTdc&_nc_zt=24&_nc_ht=scontent.ftuc1-2.fna&_nc_gid=Y_xuSGU6cTKt5zCjOmBjlw&oh=00_AfQgO363rPSZpBLGn6AqxIi0w8CDPm8EgZ3WUFrmkOpoNQ&oe=68A55A64"; // ¡CAMBIA ESTO CON EL NOMBRE DE TU IMAGEN!
                ?>
                <img src="<?php echo $imagen_personal; ?>" class="img-fluid" alt="Foto del Alumno">

                <h2 class="mt-4 mb-3">Información sobre el Alumno</h2>
                <p><strong>Nombre Completo:</strong> Cristian Manuel Aparicio</p>
		<p><strong>Catedra:</strong> Virtualizacion de Servidores - 2025</p>
                <p><strong>Carrera:</strong> Ingenieria En Sistemas de Informacion</p>
                <p><strong>Universidad:</strong> Universidad Tecnológica Nacional, Facultad Regional Tucumán</p>
                <p><strong>TPF:</strong> Implementación de Servicio de Blog Personal en Ambiente Virtualizado (Proxmox LXC en Cloud UTN)</p>
                <p><strong>Objetivo del Blog:</strong> Compartir conocimientos, avances del proyecto y experiencias de aprendizaje.</p>
                <p>Este blog personal es parte del Trabajo Final Integrador para la asignatura de Virtualizacion de Servidores.</p>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
