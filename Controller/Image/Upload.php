<?php

namespace Web\Controller\Image;

use Web\Model\Database\Connection;
include '../../Model/Database/Connection.php';

session_start();

class Upload
{
    public function uploadImage($uploadFileDir)
    {
        if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {

            $fileName = $_FILES['img']['name'];
            $fileTmpPath = $_FILES['img']['tmp_name'];

            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            $allowedFileExtensions = array('jpg', 'gif', 'png', 'jpeg');

            if (in_array($fileExtension, $allowedFileExtensions)) {
                $destPath = $uploadFileDir.$newFileName;
                $_SESSION['path'] = $destPath;
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    echo "<script language='javascript'>
                       alert('File uploaded!')
                     </script>";

                } else {
                    echo "<script language='javascript'>
                       alert('Can not upload file!')
                      </script>";

                }
            }
        }else {
            echo "<script language='javascript'>
           alert('Thất bại!')
           </script>";

        }
    }

    public function uploadText(){
        $caption = $_POST['caption'];
    }
}