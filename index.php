<?php 
session_start();
require_once 'bootstrap.php';
// Tất cả các file đều chạy qua index.php này

/* PATH_INFO: là đường dẫn sau thư mục gốc learn_mvc_unicode: 
   Ví dụ: http://localhost/learn_mvc_unicode/index thì PATH_INFO sẽ là: /index
*/

$app = new App();
