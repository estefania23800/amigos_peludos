<?php
abstract class railwayDB {
private static $server = 'bejrzejleklwc71alydh-mysql.services.clever-cloud.com';
private static $db = 'bejrzejleklwc71alydh';
private static $user = 'uzvk8pxqhhyli6iw';
private static $password = 'eirCYtKbb3rXzwmBY7mH';
public static function connectDB() {
try {
//$connection = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");

$connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
die ("Error: " . $e->getMessage());
}
return $connection;
}
}




/*abstract class railwayDB{
    private static $host = 'roundhouse.proxy.rlwy.net';
    private static $port = '50983';
    private static $user = 'root';
    private static $password = 'GFB2ED-ggd5AB16h14FFgGG-A2a44a32';
    private static $database = 'railway';

    try {
        //$connection = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
        $mysqli = new mysqli($host, $user, $password, $database, $port);
        echo "se conecto";
        } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
        }

    return $mysqli;

}*/
?>