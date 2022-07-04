<!-- Kết nối DB -->
<?php
class Connection
{
    private static $instance = null, $conn;
    private function __construct($configDB){
        try {
            if (class_exists('PDO')) {
                $dsn = $configDB['driver'] . ':dbname=' . $configDB['db'] . ';host=' .$configDB['host'];
                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Đẩy lỗi vào ngoại lệ khi truy vấn 
                ];
                $con = new PDO($dsn, $configDB['user'], isset($configDB['pass']) ? $configDB['pass'] : '', $options);
                self::$conn = $con;
            }
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            die($mess); // kết nối thất bại thì die luôn
        }
    }
    // Biến config này được truyền bên file bootstrap: $conn = Connection::getInstance($config_db);
    public static function getInstance($configDB)
    {
        if (!self::$instance) {
            $connection = new Connection($configDB);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}

?>