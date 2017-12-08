<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/7
 * Time: 15:19
 */
session_start();
include ('../../books/common/db.php');
if(isset($_POST['submit'])){
    $pname=$_POST['pname'];
    $ptype=$_POST['phototype'];
    $user=$_SESSION['user'];
    $pmess=$_POST['pmess'];
    $t=time();
    $imgurl=$_POST['photos'];
    if($pname==""or $pmess==""){
        echo "you must input your photo message!!!<br>";
        echo "<a href='add_photo.php'>back add_photo</a>";
    }else{
        if($imgurl) {
            foreach ($imgurl as $val) {
                if ($val!= "") {
                    $sql="INSERT INTO book_photo(pname,pmess,user,time,phototype,img) VALUE ('$pname','$pmess','$user','$t','$ptype','$val')";
                    $result=$mysqli->query($sql);
                    if(!$result){
                        echo "添加错误！！！<br>";
                        echo "<a href='add_photo.php'>back add_photo</a>";
                    }else{
                        echo "添加成功！！！<br>";
                        echo "<a href='add_photo.php'>back add_photo</a><br>";
                    }
                }else{
                    echo "添加错误！！！<br>";
                    echo "<a href='add_photo.php'>back add_photo</a>";
                }
            }
        }
    }
}else{
    echo "error<br>";
    echo "<a href='add_photo.php'>back add_photo</a>";
}

