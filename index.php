<?php
echo "Bienvenido a la tare 03 del curso de CEFIRE -Mcirosoft Azure-"
?>   

<?php
// Configuración de la conexión a la base de datos
$servidor = "mibdsergioortiz.mysql.database.azure.com"; // Servidor MySQL
?>

<?php
$usuario = "sergio";    // Tu usuario de MySQL
?>

<?php
$password = "Alumno@8"; // Tu contraseña de MySQL
?>

<?php
$basedatos = "sergioortiz"; // Nombre de la base de datos
?>

<?php
echo "Crear conexión"
?>   

<?php
// Crear conexión
$conexion = new mysqli($servidor, $usuario, $password, $basedatos);
?>

<?php
echo "Creada conexión"
?>   

<?php
echo "Verificar conexión\n"
?>   

<?php
// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>

<?php
echo "Verificada la conexión\n"
?>   

<?php
echo "Crear consulta\n"
?>   

<?php
// Consulta SQL para obtener el valor del contador
$sql = "SELECT contador FROM tarea03 LIMIT 1";
?>

<?php
echo "Ejecutar consulta\n"
?>   

<?php
$resultado = $conexion->query($sql);
?>

<?php
echo "Ejecutada consulta\n"
?>   


<?php
if ($resultado->num_rows > 0) {
    // Obtener el valor del contador
    $fila = $resultado->fetch_assoc();
    echo "El valor del contador es: " . $fila["contador"];
} else {
    echo "No se encontraron resultados en la tabla tarea03";
}
?>

<?php
// Consulta SQL para incrementar en uno el contador.
$sql = "UPDATE tarea03 SET contador = contador + 1 WHERE my_row_id = 1";
?>

<?php
$resultado = $conexion->query($sql);
?>

<?php
// Cerrar conexión
$conexion->close();
?>
  
<?php
echo "Adios a la tare 03 del curso de CEFIRE -Mcirosoft Azure-"

?>
