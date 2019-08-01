<?php

namespace Web\Model\Database;

class Connection
{
    const MYSQL_SERVER = 'localhost';
    const MYSQL_USER_NAME = 'phpmyadmin';
    const MYSQL_PASS = 'Trang1234#';
    const MYSQL_DATABASE = 'ThongTin';

    public function add($tableName, $data, $columns)
    {

        $query = "INSERT INTO $tableName (" . implode(',', $columns) . ") VALUE (" . implode(',', $data) . ")";
        $result = $this->query($query);
        if ($result) {
            return $result;
        }
        $this->closeConnection();
    }

    public function get($tableName, $data, $column)
    {
        $query = "SELECT * FROM $tableName WHERE $column = '$data'";
        return $this->query($query);
    }

    public function getAll($tableName)
    {
        $query = "SELECT * FROM $tableName";
        $result = $this->query($query);
        if (!empty($result)) {
            return $result;
        } else {
            return [];
        }
        $this->closeConnection();
    }

    public function delete()
    {
    }

    public function update()
    {

    }

    private function initConnection()
    {
        $conn = mysqli_connect(static::MYSQL_SERVER, static::MYSQL_USER_NAME, static::MYSQL_PASS, static::MYSQL_DATABASE);
        mysqli_set_charset($conn, 'UTF8');
        if (!$conn) {
            die('Connection failed');
        }
        return $conn;
    }

    public function query($query)
    {
        $query = mysqli_query($this->initConnection(), $query);
        $result = [];
        while ($data = mysqli_fetch_assoc($query)){
            $result[] = $data;
        }
        return $result;
    }

    public function query1($query){
        $query = mysqli_query($this->initConnection(), $query);
        return $query;
    }

    private function closeConnection()
    {
        return mysqli_close($this->initConnection());
    }

}

