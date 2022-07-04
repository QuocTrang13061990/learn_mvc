<!-- Tất cả model đều extends từ core/Model -->
<?php

class HomeModel extends Model { 
    function getList(){
        // $where = ['id' => 3, 'status' => 1];
        $sql = "SELECT * FROM `services` WHERE id=4";
        $servicesAll = $this->getRaw($sql);
        return $servicesAll;
    }
    //dataInsert
   
    function insertUser(){
        $dataInsert = [
            'opt_key' => 'general_address',
            'opt_value' => 'Hà Nội',
            'name' => 'Địa Chỉ'
        ];
        $insertStatus = $this->insert('options', $dataInsert);
        return $insertStatus;
    }

    function updateOption(){
        $dataUpdate = [
            'opt_key' => 'general_address',
            'opt_value' => 'Quảng Nam',
            'name' => 'Địa Chỉ'
        ];
        $where = [
            'id' => 5,
        ];
        return $this->update('options', $dataUpdate, $where);
    }
}