<?php 

class App
{
    protected $controller, $action, $parrams;

    function __construct()
    {
        global $routes, $config;
        $this->controller = $routes['default_controller'];
        $this->action = 'index';
        $this->parrams = [];
        $this->UrlProcess();
    }

    function UrlProcess(){
        if (isset($_GET['url'])) {
            $urlArr =  explode('/', filter_var(trim($_GET['url'], '/')));
        }
       
        // xu ly controller
        if(!empty($urlArr[0])) {
            if (file_exists("./app/controllers/" . $urlArr[0] . ".php")) {
                $this->controller = $urlArr[0];
            }else {
                $this->loadError();
            }
            unset($urlArr[0]);
        }
        require_once "./app/controllers/" . $this->controller . ".php";
        if(class_exists($this->controller)) {
            $this->controller = new $this->controller;
        }else {
            $this->loadError();
        }
        // xu ly action
        if(!empty($urlArr[1])) {
            if(method_exists($this->controller, $urlArr[1])) {
                $this->action = $urlArr[1];
            }else {
                $this->loadError();
            }
            unset($urlArr[1]);
        }
 
        // xu ly parrams
        $this->parrams = !empty($urlArr) ? array_values($urlArr) : [];
        // Gọi hàm để chạy controller, action và parrams
        call_user_func_array([$this->controller, $this->action], $this->parrams);
    }
     // function xử lý lỗi
    function loadError($nameError='404'){
        require_once 'errors/'.$nameError.'.php';
        die();
    }
}





// class App{
//     private $controller, $action, $parrams;
//     function __construct(){
//         global $routes;
//         $this->controller = $routes['default_controller'];
//         $this->action = 'index';
//         $this->parrams = [];

//         $this->handleUrl();
//     }
//     // lấy url
//     function getUrl(){
//         $url = !empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
//         return $url;
//     }
//     // xử lý url
//     function handleUrl(){
//         $url = $this->getUrl();
//         $urlArr = array_filter(explode('/', $url));
//         $urlArr = array_values($urlArr); // Đưa mảng về thứ tự: 0,1,2
//         // require controller 
//         if(!empty($urlArr[0])){
//             $this->controller = $urlArr[0]; 
//         }
//         if(file_exists('app/controllers/'.($this->controller).'.php')) {
//             require_once 'controllers/'.($this->controller).'.php';
//             // Tạo đối tượng ứng với controller đó, khi đó mới truy cập được tới thuộc tính, phương thức trong class đó
//             $this->controller = new $this->controller;
//             unset($urlArr[0]);
//         }else {
//             $this->loadError();
//         }
//         // xử lý action
//         if(!empty($urlArr[1])) {
//             $this->action = $urlArr[1];
//             unset($urlArr[1]);
//         }
//         // xử lý parrams
//         $this->parrams = array_values($urlArr);
//         // Kiểm tra method tồn tại 
//         if(method_exists($this->controller, $this->action)) {
//             call_user_func_array([$this->controller, $this->action], $this->parrams);
//         }else {
//             $this->loadError();
//         }
//     }
//     // function xử lý lỗi
//     function loadError($nameError='404'){
//         require_once 'errors/'.$nameError.'.php';
//     }
//     // echo '<pre>';
//     // print_r($urlArr);
//     // echo '</pre>';
// }