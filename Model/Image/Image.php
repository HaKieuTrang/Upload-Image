<?php

namespace Web\Model\Image;

use Web\Model\Database\Connection;

include '../Database/Connection.php';

class Image
{
    protected $_connection;
    const IMAGE_TABLE = 'Information_Images';

    public function __construct(Connection $connection)
    {
        $this->_connection = $connection;
    }

    public function getAllImage()
    {
        $allImage = $this->_connection->getAll(static::IMAGE_TABLE);
        return $allImage;
    }

    public function getInfoByName($imageName)
    {
        $result = $this->_connection->query("SELECT image_id, caption, date  FROM Information_Image WHERE name = '$imageName'");
        return $result;
    }

    public function getUserByImage($imageId){
        $UserName = $this->_connection->query("SELECT name FROM Information_User WHERE user_id = (SELECT user_id FROM User_Photos WHERE image_id = '$imageId') ");
        return $UserName;
    }
}