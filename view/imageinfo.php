<?php

use Web\Model\Database\Connection;
use Web\Model\Image\Image;

include '../Model/Database/Connection.php';
include '../Model/Image/Image.php';
session_start();
$imageName = $_GET['name'];
$conn = new Connection();
$result = new Image($conn);
$info = $result->getInfoByName($imageName);
$imageId = $info[0]['image_id'];
$userName = $result->getUserByImage($imageId);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Image info</title>
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">
    <meta name="description"
          content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website  template"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/title.css">
    <link rel="stylesheet" type="text/css" href="css/imageinfo.css">
    <script type="text/javascript" src="js/homepage/jquery.js"></script>
    <script type="text/javascript" src="js/homepage/main.js"></script>
</head>
<body>

<header>
    <div class="title">
        <p>IMAGE INFO</p>
    </div><!-- end logo -->

    <div id="menu_icon"></div>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="userinfo.php">Profile</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="signin.php">Logout</a></li>
        </ul>
    </nav><!-- end navigation menu -->

    <div class="footer clearfix">
        <ul class="social clearfix">
            <li><a href="#" class="fb" data-title="Facebook"></a></li>
            <li><a href="#" class="google" data-title="Google +"></a></li>
            <li><a href="#" class="behance" data-title="Behance"></a></li>
            <li><a href="#" class="rss" data-title="RSS"></a></li>
        </ul><!-- end social -->

        <div class="rights">
            <p>Copyright © 2014 magnetic.</p>
            <p>Template by <a href="">Pixelhint.com</a></p>
        </div><!-- end rights -->
    </div><!-- end footer -->
</header><!-- end header -->

<section class="main clearfix">
    <div>
        <img src="<?php echo $_GET['name'] ?>" width="800"/>
    </div>

    <div class="comment">
        <p>Bình luận của mọi người:</p>
        <textarea rows="25" cols="45" readonly="readonly"></textarea><br>
        <p>Viết bình luận của bạn:</p>
        <textarea rows="4" cols="45"></textarea><br>
        <div id="btn">
            <button class="btn">Like Image</button>
            <button class="btn">Comment</button>
        </div>

    </div>

    <div>
        Người đăng: <a
                href="userinfo2.php<?php echo "?name=" . $userName[0]['name'] ?>"> <?php echo $userName[0]['name'] ?></a><br>
        Caption: <?php echo $info[0]['caption'] ?><br>
        Ngày đăng: <?php echo $info[0]['date'] ?>
    </div>
</section><!-- end main -->

</body>
</html>