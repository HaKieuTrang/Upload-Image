<?php

use Web\Model\Database\Connection;
use Web\Model\Image\Image;
use Web\Model\User\User;
use Web\Controller\Image\AddComment;

include '../Model/Database/Connection.php';
include '../Model/Image/Image.php';
include '../Model/User/User.php';
include '../Controller/Image/AddComment.php';

session_start();
$imageName = $_GET['name'];
$conn = new Connection();
$result = new Image($conn);
$info = $result->getInfoByName($imageName);
$imageId = $info[0]['image_id'];
$userName = $result->getUserByImage($imageId);

$userCmt = new User($conn);
$userNameCmt = $_SESSION['name'];
$userCmtId = $userCmt->getIdByName($userNameCmt);

$add = new AddComment($conn);
$getCmt = $add->getCmtByImageId($imageId);
$comment = $_POST['cmt'];
if (isset($_POST['btCmt']) && $comment != "") {
   $addComment = $add->addCmt($userCmtId, $imageId, $comment);
   if ($addComment) {
    $getCmt = $add->getCmtByImageId($imageId);
    echo "<script language='javascript'>
    alert('Đã bình luận!')
    </script>";
} else {
    echo "<script language='javascript'>
    alert('Không bình luận được!')
    </script>";
}
}

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

        <?php include 'header.php' ?>
    </header><!-- end header -->

    <section class="main clearfix">
        <div>
            <img src="<?php echo $_GET['name'] ?>" width="800"/>
        </div>

        <div class="comment">
            <p>Bình luận của mọi người:</p>
            <form method="POST">
                <textarea rows="24" cols="40" readonly="readonly" name="loadCmt">
                    <?php
                    while ($row = mysqli_fetch_array($getCmt)) {
                        echo "\n- ".$row['comment'];
                    }
                    ?>
                </textarea><br>
                <p>Viết bình luận của bạn:</p>

                <textarea rows="4" cols="40" name="cmt"></textarea><br>
                <div id="btn">
                    <button class="btn" id="btLike">Like Image</button>
                    <input type="submit" class="btn" name="btCmt" value="Comment">
                </div>
            </form>

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