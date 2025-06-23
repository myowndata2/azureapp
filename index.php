<?php
// Mensaje de bienvenida
echo "Bienvenido a la tarea 03 del curso de CEFIRE - Microsoft Azure\n";

// Configuración de la conexión
$servidor = "mibdsergioortiz.mysql.database.azure.com"; // Servidor MySQL
$usuario = "sergio";    // Tu usuario de MySQL
$password = "Alumno@8"; // Tu contraseña de MySQL
$basedatos = "sergioortiz"; // Nombre de la base de datos

// Crear conexión
echo "Creando conexión...\n";
$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

// Verificar conexión
echo "Conexión creada correctamente.\n";

echo "Verificando la existencia de la conexión.\n";

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


// Consulta para obtener el contador
echo "Ejecutando consulta SELECT...\n";
$sql = "SELECT contador FROM tarea03 LIMIT 1";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    echo "El valor del contador es: " . $fila["contador"] . "\n";

    // Incrementar el contador
    $sql_update = "UPDATE tarea03 SET contador = contador + 1 WHERE id = 1";
    if ($conexion->query($sql_update) === TRUE) {
        echo "Contador actualizado correctamente.\n";
    } else {
        echo "Error al actualizar el contador: " . $conexion->error . "\n";
    }
} else {
    echo "No se encontraron resultados en la tabla tarea03\n";
}

// Cerrar conexión
$conexion->close();
echo "Adiós de la tarea 03 del curso de CEFIRE - Microsoft Azure\n";
