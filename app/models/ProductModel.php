<?php

class ProductModel {
    function list(){
        $list = [
            [
                'id' => 1,
                'name' => 'san pham 1'
            ],
            [
                'id' => 2,
                'name' => 'san pham 2'
            ]
        ];
        return $list;
    }

    function detail($id=''){
        $detail = [
            'id' => 1,
            'name' => 'san pham 1'
        ];
        return $detail;
    }
}