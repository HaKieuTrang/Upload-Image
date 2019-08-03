<?php
session_start();

use Web\Controller\Image\Upload;
use Web\Model\Database\Connection;

include '../Model/Database/Connection.php';
include '../Controller/Image/Upload.php';

if (isset($_POST['submit'])) {
    $uploadImage = new Upload();
    $uploadImage->uploadImage('upload/');
    $uploadImage->uploadText();

    $conn = new Connection();
    $time = date('Y-m-d H:i:s');
    $filePath = $_SESSION['path'];
    $cap = $_POST['caption'];
    $conn->query("INSERT INTO Information_Image (name, date, caption)  VALUES ('{$filePath}','{$time}','{$cap}') ");

    $name = $_SESSION['name'];
    $userIdResult = $conn->query1("SELECT user_id FROM Information_User WHERE name = '$name'");
    $imgIdResult = $conn->query1("SELECT image_id FROM Information_Image WHERE name = '$filePath'");
    while ($rowUser = mysqli_fetch_assoc($userIdResult)  ) {
        $userId = $rowUser['user_id'];
    }
    while ( $rowImg = mysqli_fetch_assoc($imgIdResult)){
          $imgId = $rowImg ['image_id'];
          $conn->query("INSERT INTO User_Photos ( image_id, user_id )  VALUES ('{$imgId}', '{$userId}')");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload</title>
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">
    <meta name="description"
          content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website template"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/title.css">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/upload.css">
    <script type="text/javascript" src="js/homepage/jquery.js"></script>
    <script type="text/javascript" src="js/homepage/main.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<header>
    <div class="title">
        <p>UPLOAD</p>
    </div><!-- end logo -->

    <div id="menu_icon"></div>
    <nav>
        <ul>
            <li><a href="../index.php" class="selected">Home</a></li>
            <li><a href="userinfo.php">Profile</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="../Controller/User/Logout.php">Log out</a></li>
        </ul>
    </nav><!-- end navigation menu -->

    <div class="footer clearfix">
        <ul class="social clearfix">
            <li><a href="#" class="fb" data-title="Facebook"></a></li>
            <li><a href="#" class="google" data-title="Google +"></a></li>
            <!--<li><a href="#" class="behance" data-title="Behance"></a></li>
             <li><a href="#" class="twitter" data-title="Twitter"></a></li>
             <li><a href="#" class="dribble" data-title="Dribble"></a></li>-->
            <li><a href="#" class="rss" data-title="RSS"></a></li>
        </ul><!-- end social -->

        <div class="rights">
            <p>Copyright © 2014 magnetic.</p>
            <p>Template by <a href="">Pixelhint.com</a></p>
        </div><!-- end rights -->
    </div><!-- end footer -->
</header><!-- end header -->
<section class="main clearfix">
    <div class="container">
        <div class="col-md-6">
            <div class="form-group">
                <label id="upload">Upload Image</label><br><br>
                <form method="POST" enctype="multipart/form-data" action="">
                    <p id="cap">Caption:</p><br><br>
                    <textarea name="caption" rows="5" cols="63"></textarea><br><br>
                    <input type="file" name="img"> <br><br>
                    <input type="submit" name="submit" value="Upload" id="btn">
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>