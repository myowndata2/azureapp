<?php
$host = "mibdsergioortiz.mysql.database.azure.com";
$user = "sergio";
$password = "Alumno@8";
$dbname = "sergioortiz";

echo "Hola mundo\n";

// Recuperar variables de entorno
$dbHost = $host;
$dbName = $dbname;         
$dbUser = $user;
$dbPass = $password;

if (!$dbHost || !$dbUser || $dbPass === false) {
    throw new \RuntimeException('Faltan variables de entorno para la conexión a la base de datos.');
}

// DSN con charset utf8mb4
$dsn = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";

try {
    $options = [
        // Excepciones en errores
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        // Fetch como array asociativo
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // Desactivar emulación de prepares
        PDO::ATTR_EMULATE_PREPARES   => false,

        // Asegurar la conexión TLS hacia Azure Database for MySQL
        PDO::MYSQL_ATTR_SSL_CA        => '/etc/ssl/certs/BaltimoreCyberTrustRoot.crt.pem',
        // Desactivamos la validación del certificado SSL
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
    ];

    // Crear la conexión PDO
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);

    // Ejemplo: consulta sencilla
    $stmt = $pdo->query('SELECT contador FROM tarea03 LIMIT 1;');
    $fila = $stmt->fetch();
    echo "\n Conectado correctamente. Contador: " . $fila['contador'];
    $stmt = $pdo->query('UPDATE tarea03 SET contador = contador + 1 WHERE my_row_id = 1;');
} catch (PDOException $e) {
    error_log('Error de conexión PDO: ' . $e->getMessage());
    echo "\n Error al conectar con la base de datos: " . htmlspecialchars($e->getMessage());
    exit;
}


echo "\n Fin de la tarea \n";

?>
