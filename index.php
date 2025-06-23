<?php

echo "Bienvenido a la tare 03 del curso de CEFIRE -Mcirosoft Azure-"
    
// Configuración de la conexión a la base de datos
$servidor = "mibdsergioortiz.mysql.database.azure.com"; // Servidor MySQL
$usuario = "sergio";    // Tu usuario de MySQL
$password = "Alumno@8"; // Tu contraseña de MySQL
$basedatos = "sergioortiz"; // Nombre de la base de datos

// Crear conexión
$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
mysqli_real_connect($conn, "mibdsergioortiz.mysql.database.azure.com", "sergio", "Alumno@8", "sergioortiz", 3306, MYSQLI_CLIENT_SSL);

// Cerrar conexión


echo "Adios a la tare 03 del curso de CEFIRE -Mcirosoft Azure-"

?>
