<?php 

class Home extends Controller {
    function index(){
        $dashboardInfor = [
            'page' => 'homes/index',
            'titlePage' => 'Tổng quan',
        ];
        $this->loadView('layouts/admin_layout', $dashboardInfor);
    }

    function add(){
         // Get data from model
         $allServices = $this->loadModel('HomeModel')->getList();
         $allServicesArr = [
             'page' => 'homes/index',
             'titlePage' => 'Tổng quan',
             'dataPage' => $allServices,
         ];
         $this->loadView('layouts/admin_layout', $allServicesArr);
    }

    function edit(){
        $editStatus = $this->loadModel('HomeModel')->updateOption();
    }

    function delete(){
        $deleteStatus = $this->loadModel('ProductModel')->deleteOption();
        var_dump($deleteStatus); 
    }

    function getAll(){
        $allOptions = $this->loadModel('ProductModel')->getAllOption();
        echo '<pre>';
        print_r($allOptions);
    }
}