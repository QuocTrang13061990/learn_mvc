<?php

class Product extends Controller {
    // public $data = [];

    function index(){
        echo 'product/index';
    }

    function list(){
        // Get data from Model
        $productList = $this->loadModel('ProductModel')->list();
        // Data send to View
        $dataProductListArr = [
            'page' => 'products/list',
            'titlePage' => 'Products lists',
            'dataPage' => $productList,
        ];
        // Get data from View
        $this->loadView('layouts/admin_layout', $dataProductListArr);
    }
    function detail($id=''){
        $productDetail = $this->loadModel('ProductModel')->detail();
        $dataProductDetailArr = [
            'page' => 'products/detail',
            'titlePage' => 'Product details',
            'dataPage' => $productDetail,
        ];
        $this->loadView('layouts/admin_layout', $dataProductDetailArr);
    }
}