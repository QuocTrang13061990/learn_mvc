<!-- File này truy vấn csdl 
    NOTE: Khi truy vấn đến Radix thì đối với những table có foregin key sẽ phải điền đầy đủ thông số cần phải điền, nên khi test sẽ chọn những table không có foregin key, như table options

-->

<?php

class Model
{
    private $__conn;

    function __construct()
    {
        global $config_db;
        $this->__conn = Connection::getInstance($config_db);
    }

    function query($sql, $data = [], $statementStatus = false)
    {
        $queryStatus = false;
        try {
            $statement = $this->__conn->prepare($sql);
            if (empty($data)) {
                $queryStatus = $statement->execute();
            } else {
                $queryStatus = $statement->execute($data);
            }
        } catch (Exception $exception) {
            require_once './app/errors/database.php';
            die();
        }
        if($statementStatus && $queryStatus){
            return $statement;
        }
        return $queryStatus;
    }
    // Lấy id vừa add vào db
    function insertId(){
        return $this->__conn->lastInsertId();
    }
    // select tất cả bản ghi (truyền vào sql)
    function getRaw($sql){
        $statement = $this->query($sql, [], true);
        if(is_object($statement)) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    // select bản ghi đầu tiên (truyền vào sql)
    function firstRaw($sql){
        $statement = $this->query($sql, [], true);
        if(is_object($statement)){
            return $statement->fetch(PDO::FETCH_ASSOC);

        }
    }

    // insert Cách 1 (learn programming)
    // function insert($table, $dataInsert=[]){
    //     $dataKey = array_keys($dataInsert);
    //     $fieldStr = implode(', ', $dataKey); 
    //     $dataValues = array_values($dataInsert); 
    //     $qr = str_repeat("?,", count($dataKey)-1);
    //     $sql = 'INSERT INTO '.$table.'('.$fieldStr.') VALUES('.$qr.'?)';
    //     return $this->query($sql, $dataValues);
    // }
    // insert Cách 2 (unicode: radix modules)
    function insert($table, $dataInsert = []){
        $dataKey = array_keys($dataInsert);
        $fieldStr = implode(', ', $dataKey);
        $valueStr = ':' . implode(', :', $dataKey);
        $sql = 'INSERT INTO ' . $table . '(' . $fieldStr . ') VALUES(' . $valueStr . ')';
        return $this->query($sql, $dataInsert);
    }
    // Update (learn programming: UPDATE options SET opt_key=?, opt_value=?, name=? WHERE id=5 AND name=tqt AND age=32)
    function update($table, $dataUpdate = [], $where = []){
        if (!empty($dataUpdate) && !empty($where)) {
            $dataUpdateKeys = array_keys($dataUpdate);
            $dataUpdateValues = array_values($dataUpdate);
            $sql = "UPDATE $table SET ";
            $isDataUpdates = true;
            for ($i = 0; $i < count($dataUpdateKeys); $i++) {
                if (!$isDataUpdates) {
                    $sql .= ", ";
                }
                $sql .= $dataUpdateKeys[$i] . "=?";
                $isDataUpdates = false;
            }
            $whereKeys = array_keys($where);
            $whereValues = array_values($where);
            $isWheres = true;
            $whereStr = " WHERE ";
            for($i = 0; $i < count($whereKeys); $i++){
                if(!$isWheres) {
                    $sql .= " AND ";
                    $whereStr = "";
                }
                $sql .= $whereStr.$whereKeys[$i]."=".$whereValues[$i];
                $isWheres = false;
            }
            return $this->query($sql, $dataUpdateValues);
        }
    }

    // delete
    function delete($table, $where=[]){
        if(!empty($where)) {
            $whereKeys = array_keys($where);
            $whereValues = array_values($where);
            $sql = "DELETE FROM $table WHERE ";
            $isWheres = true;
            for($i = 0; $i < count($whereKeys); $i++) {
                if(!$isWheres) {
                    $sql .= " AND ";
                }
                $sql .= $whereKeys[$i]."=".$whereValues[$i];
                $isWheres = false;
            }
            return $this->query($sql);
        }

    }
    
    
}

?>