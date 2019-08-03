<?php

namespace Web\Model\User;

use Web\Model\Database\Connection;

include '../Database/Connection.php';


class User
{
    const USER_TABLE_NAME = 'Information_User';
    protected $_connection;
    protected $_data = [];

    public function __construct(Connection $connection)
    {
        $this->_connection = $connection;
    }

    public function getData($key)
    {
        return $this->_data[$key];
    }

    public function load($id)
    {
        $userData = $this->_connection->get(static::USER_TABLE_NAME, $this->getData($id), $id);
        $this->_data = $userData;
        return true;
    }

    public function loadByUserName($userName)
    {
        return $this->_connection->get(static::USER_TABLE_NAME, $userName, 'name');
    }

    public function loadImageByName($name)
    {
        $userSql = $this->_connection->query("SELECT user_id FROM Information_User WHERE name = '$name'");
        foreach ($userSql as $value)
        {
            $userId = $value['user_id'];
            $sql = "SELECT name FROM Information_Image WHERE image_id IN (SELECT image_id FROM User_Photos WHERE  user_id = '$userId')";
            $result = $this->_connection->query($sql);
        }
        return $result;
    }

    public function getIdByName($name)
    {
        $userSql = $this->_connection->query("SELECT user_id FROM Information_User WHERE name = '$name'");
        foreach ($userSql as $value) {
            $userId = $value['user_id'];
        }
        return $userId;
    }

    public function getNameById($userId)
    {
        $userSql = $this->_connection->query("SELECT name FROM Information_User WHERE user_id = '$userId'");
        foreach ($userSql as $value) {
            $userName = $value['name'];
        }
        return $userName;
    }
}