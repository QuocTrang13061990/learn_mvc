<?php 

class Home extends Controller {
    function index(){
        $data = $this->loadModel('HomeModel')->getList();
        print_r($data);
    }

    function detail($id='', $slug=''){
        echo "id sản phẩm là: $id";
        echo "<br> slug: $slug";
    }
}