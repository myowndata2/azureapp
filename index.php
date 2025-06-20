<?php
// Configuración de la conexión a la base de datos
$servidor = "mibdsergioortiz.mysql.database.azure.com"; // Servidor MySQL
$usuario = "sergio";    // Tu usuario de MySQL
$password = "Alumno@8"; // Tu contraseña de MySQL
$basedatos = "sergioortiz"; // Nombre de la base de datos

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta SQL para obtener el valor del contador
$sql = "SELECT contador FROM tarea03 LIMIT 1";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Obtener el valor del contador
    $fila = $resultado->fetch_assoc();
    echo "El valor del contador es: " . $fila["contador"];
} else {
    echo "No se encontraron resultados en la tabla tarea03";
}

// Cerrar conexión
$conexion->close();
?>
