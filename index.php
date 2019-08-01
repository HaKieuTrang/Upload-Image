<?php
session_start();

include 'Model/Database/Connection.php';
include 'Model/Image/Image.php';

$conn = new \Web\Model\Database\Connection();
$result = $conn->query("SELECT name FROM Information_Image");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">
    <meta name="description"
          content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website template"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="view/css/reset.css">
    <link rel="icon" type="image/png" href="view/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="view/css/main.css">
    <link rel="stylesheet" type="text/css" href="view/css/title.css">
    <link rel="stylesheet" type="text/css" href="view/css/index.css">

    <script type="text/javascript" src="view/js/homepage/jquery.js"></script>
    <script type="text/javascript" src="view/js/homepage/main.js"></script>
</head>
<body>

<header>
    <div class="title">
        <p>HOME PAGE</p>
    </div><!-- end logo -->

    <div id="menu_icon"></div>
    <nav>
        <ul>
            <li><a href="index.php" class="selected">Home</a></li>
            <li><a href="view/userinfo.php">Profile</a></li>
            <li><a href="view/upload.php">Upload</a></li>
            <li><a href="view/signin.php">Log out</a></li>
        </ul>
    </nav><!-- end navigation menu -->

    <div class="footer clearfix">
        <ul class="social clearfix">
            <li><a href="#" class="fb" data-title="Facebook"></a></li>
            <li><a href="#" class="google" data-title="Google +"></a></li>
            <li><a href="#" class="rss" data-title="RSS"></a></li>
        </ul><!-- end social -->

        <div class="rights">
            <p>Copyright © 2014 magnetic.</p>
            <p>Template by <a href="">Pixelhint.com</a></p>
        </div><!-- end rights -->
    </div><!-- end footer -->
</header><!-- end header -->

<section class="main clearfix">
    <div class="header">
        <p>Chào mừng <?php echo $_SESSION['name'] ?> đến với trang chia sẻ ảnh</p>
    </div>
    <?php foreach ($result as $image): ?>
    <div class="work">
        <a href="view/imageinfo.php<?php echo"?name=".$image['name']?>">
            <img src="view/<?php echo $image['name'] ?>" class="media" alt=""/>

            <div class="caption">
                <div class="work_title">
                    <h1>Chi tiết ảnh</h1>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
</section><!-- end main -->

</body>
</html>