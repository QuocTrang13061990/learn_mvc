<?php 

/* 
    Trên window:
        - $_SERVER['DOCUMENT_ROOT'] => C:/xampp/htdocs
        - __DIR__ =>  C:\xampp/htdocs\learn_mvc_unicode
    Trên mac: 
        - $_SERVER['DOCUMENT_ROOT'] => /applications/AMPPS/www
        - __DIR__ => /applications/Ampps/www/learn_mvc_unicode
*/

/* ******************************************************************************************************** */
define('_DIR', str_replace('\\', '/', __DIR__)); // C:/xampp/htdocs/learn_mvc_unicode
// xử lý http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = "https://".$_SERVER['HTTP_HOST']; // https://localhost
}else {
    $web_root = "http://".$_SERVER['HTTP_HOST']; // http://localhost
}
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(_DIR)); // /learn_mvc_unicode
$web_root.=$folder;
define('_WEB_ROOT', $web_root); // http://localhost/learn_mvc_unicode
/* **********************************************************************************************************/
// require tất cả file nằm trong folder configs
$configArr = scandir('configs');
if(!empty($configArr)) {
    foreach($configArr as $configFile){
        if($configFile != '.' && $configFile != '..' && file_exists('configs/'.$configFile)) {
            require_once 'configs/'.$configFile;
        }
    }
}
require_once './app/App.php';
// kiểm tra config và load db
if(!empty($config['database'])) {
    $config_db = array_filter($config['database']);
    if(!empty($config_db)) {
        require_once 'core/connection.php';
        $conn = Connection::getInstance($config_db);// kết nối đến db (chạy _construct trong class Connection), nếu chạy thêm 1 lần nữa thì cũng chỉ kết nối đúng 1 lần (bên hàm getInstance đã có phần check), lẽ ra là 2 lần. Đây là cái hay của singleton

    }
}
require_once './core/Controller.php';