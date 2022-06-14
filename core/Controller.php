<?php

class Controller {
    function loadModel($model){
        if(file_exists("./app/models/".$model.".php")) {
            require_once "./app/models/".$model.".php";
            if(class_exists($model)) {
                return new $model;
            }
        }
        return false;
    }
    // $view này ta phải truyền luôn thư mục tương ứng nữa. ví du: products/detail
    function loadView($view, $data=[]) {
        extract($data); // chuyển key của $data thành biến, để qua bên view gọi cho dễ nhìn: $productDetail = $data['productDetail'];
        if(file_exists("./app/views/".$view.".php")) {
            require_once "./app/views/".$view.".php";
        }
        return false;
    }
}