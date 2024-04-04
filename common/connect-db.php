<?php
// Kết nối CSDL


function pdo_get_connection()
{
    $servername = DB_HOST;
    $port       = DB_PORT;
    $dbname     = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);
        // set the PDO error mode to exception
        // Cài đặt chế độ báo lỗi sử lí ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
///**
// * Thực thi câu lệnh sql truy vấn một bản ghi
// * @param string $sql câu lệnh sql
// * @param array $args mảng giá trị cung cấp cho các tham số của $sql
// * @return array mảng chứa bản ghi
// * @throws PDOException lỗi thực thi câu lệnh
// */
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
///**
// * Thực thi câu lệnh sql truy vấn một giá trị
// * @param string $sql câu lệnh sql
// * @param array $args mảng giá trị cung cấp cho các tham số của $sql
// * @return giá trị
// * @throws PDOException lỗi thực thi câu lệnh
// */
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
