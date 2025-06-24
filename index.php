<?php
$host = 'mibdsergioortiz.mysql.database.azure.com';
$user = 'sergio';
$password = 'Alumno@8';
$dbname = 'sergioortiz';

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, "/etc/ssl/cert.pem", NULL, NULL); // Solo si necesitas SSL
mysqli_real_connect($conn, $host, $user, $password, $dbname, 3306);

if (mysqli_connect_errno($conn)) {
    die('Fallo al conectar a MySQL: ' . mysqli_connect_error());
}

echo "Conexión correcta a la base de datos.<br>";

// Consulta de ejemplo
$sql = "SELECT contador FROM tarea03 LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "Contador actual: " . $row['contador'];

mysqli_close($conn);
?>
