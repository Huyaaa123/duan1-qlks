<?php

// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "quanlykhachsan";

// $conn = mysqli_connect($server,$username,$password,$database);

// if(!$conn){
//     die("<script>alert('connection Failed.')</script>");
// }
// else{
//     echo "<script>alert('connection successfully.')</script>";
// }

function pdo_get_connection()
{
    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "quanlykhachsan";

    // $conn = mysqli_connect($server, $username, $password, $database);
    // return $conn;

    $dburl = 'mysql:host=localhost;dbname=quanlykhachsan;charset=utf8';
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function pdo_execute($sql, $params = array())
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn); // Closing the connection
    }
}


function pdo_execute_return_lastInsertId($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * param string $sql câu lệnh sql
 * param array $args mảng giá trị cung cấp cho các tham số của $sql
 * return array mảng các bản ghi
 * throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * param string $sql câu lệnh sql
 * param array $args mảng giá trị cung cấp cho các tham số của $sql
 * return array mảng chứa bản ghi
 * throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * param string $sql câu lệnh sql
 * param array $args mảng giá trị cung cấp cho các tham số của $sql
 * return giá trị
 * throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
?>



<?php
/* Mở kết nối đến CSDL sử dụng PDO */
// function pdo_get_connection(){
//     $dburl = "mysql:host=localhost;dbname=quanlykhachsan;charset=utf8";
//     $username = 'root';
//     $password = '';

//     $conn = new PDO($dburl, $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     return $conn;
// }

// function pdo_execute($sql){
//     $sql_args = array_slice(func_get_args(), 1);
//     try{
//         $conn = pdo_get_connection();
//         $stmt = $conn->prepare($sql);
//         $stmt->execute($sql_args);
//     }
//     catch(PDOException $e){
//         throw $e;
//     }
//     finally{
//         unset($conn);
//     }
// }
// function pdo_execute_return_lastInsertId($sql){
//     $sql_args = array_slice(func_get_args(), 1);
//     try{
//         $conn = pdo_get_connection();
//         $stmt = $conn->prepare($sql);
//         $stmt->execute($sql_args);
//         return $conn->lastInsertId();
//     }
//     catch(PDOException $e){
//         throw $e;
//     }
//     finally{
//         unset($conn);
//     }
// }
// /**
//  * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
//  * param string $sql câu lệnh sql
//  * param array $args mảng giá trị cung cấp cho các tham số của $sql
//  * return array mảng các bản ghi
//  * throws PDOException lỗi thực thi câu lệnh
//  */
// function pdo_query($sql){
//     $sql_args = array_slice(func_get_args(), 1);
//     try{
//         $conn = pdo_get_connection();
//         $stmt = $conn->prepare($sql);
//         $stmt->execute($sql_args);
//         $rows = $stmt->fetchAll();
//         return $rows;
//     }
//     catch(PDOException $e){
//         throw $e;
//     }
//     finally{
//         unset($conn);
//     }
// }
// /**
//  * Thực thi câu lệnh sql truy vấn một bản ghi
//  * param string $sql câu lệnh sql
//  * param array $args mảng giá trị cung cấp cho các tham số của $sql
//  * return array mảng chứa bản ghi
//  * throws PDOException lỗi thực thi câu lệnh
//  */
// function pdo_query_one($sql){
//     $sql_args = array_slice(func_get_args(), 1);
//     try{
//         $conn = pdo_get_connection();
//         $stmt = $conn->prepare($sql);
//         $stmt->execute($sql_args);
//         $row = $stmt->fetch(PDO::FETCH_ASSOC);
//         return $row;
//     }
//     catch(PDOException $e){
//         throw $e;
//     }
//     finally{
//         unset($conn);
//     }
// }
// /**
//  * Thực thi câu lệnh sql truy vấn một giá trị
//  * param string $sql câu lệnh sql
//  * param array $args mảng giá trị cung cấp cho các tham số của $sql
//  * return giá trị
//  * throws PDOException lỗi thực thi câu lệnh
//  */
// function pdo_query_value($sql){
//     $sql_args = array_slice(func_get_args(), 1);
//     try{
//         $conn = pdo_get_connection();
//         $stmt = $conn->prepare($sql);
//         $stmt->execute($sql_args);
//         $row = $stmt->fetch(PDO::FETCH_ASSOC);
//         return array_values($row)[0];
//     }
//     catch(PDOException $e){
//         throw $e;
//     }
//     finally{
//         unset($conn);
//     }
// }
// Hàm pdo_prepare để chuẩn bị câu truy vấn sử dụng prepared statement
function pdo_prepare($sql) {
    // Thay thế bằng thông tin kết nối của cơ sở dữ liệu của bạn
  

    try {
        $conn = pdo_get_connection();
        // Đặt chế độ báo lỗi và ngoại lệ cho PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        return $stmt;
    } catch(PDOException $e) {
        echo "Lỗi kết nối: " . $e->getMessage();
    }
}

// Hàm pdo_bindValue để bind giá trị vào prepared statement
function pdo_bindValue($stmt, $param, $value, $type = null) {
    // Kiểm tra nếu kiểu dữ liệu không được xác định thì sử dụng kiểu dữ liệu mặc định
    if ($type === null) {
        switch (true) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
    }
    $stmt->bindValue($param, $value, $type);
}

// Hàm pdo_execute_one để thực thi prepared statement và trả về một bản ghi duy nhất
function pdo_execute_one($stmt) {
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

?>