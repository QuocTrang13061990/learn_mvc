<!-- Tất cả model đều extends từ core/Model -->
<?php

class homeModel{ 
    function getList(){
        $data = [
            'id' => 1,
            'fullname' => 'Tran Quoc Trang'
        ];
        return $data;
    }
}