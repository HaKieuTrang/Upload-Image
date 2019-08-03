<?php
namespace Web\Controller\Image;
use Web\Model\Database\Connection;
include '../../Model/Database/Connection.php';
class AddComment
{
    protected $_connection;
    public function __construct(Connection $connection)
    {
        $this->_connection = $connection;
    }

    public function addCmt($userId, $imageId, $comment){
        $result = $this->_connection->query1("INSERT INTO Comment VALUES ('{$comment}', '{$userId}','{$imageId}')");
        return $result;
    }

    public function getCmtByImageId($imageId){
        $result = $this->_connection->query1("SELECT comment, user_id FROM Comment WHERE image_id = '$imageId'");
        return $result;
    }
}