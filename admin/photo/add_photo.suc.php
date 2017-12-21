<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/7
 * Time: 15:19
 */
include ('../../include.php');
checkLogin();
if(isset($_POST['submit'])){
    $pname=$_POST['pname'];
    $pmess=$_POST['pmess'];
    $t=time();
    $imgurl=$_POST['photos'];
    if($pname==""or $pmess==""){
        echo "you must input your photo message!!!<br>";
        echo "<a href='add_photo.php'>back add_photo</a>";
    }else{
        if($imgurl) {
            foreach ($imgurl as $val) {
                $array = [
                    'pname' => $_POST['pname'],
                    'pmess' => $_POST['pmess'],
                    'user' => $_SESSION['user'],
                    'time' => $t,
                    'phototype' => $_POST['phototype'],
                    'img' => $val
                ];
                $result = insert("book_photo", $array);
            }
                echo "添加成功！！！<br>";
                echo "<a href='add_photo.php'>back add_photo</a><br>";
           }
        }
}else{
    echo "error<br>";
    echo "<a href='add_photo.php'>back add_photo</a>";
}

