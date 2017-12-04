<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/4
 * Time: 11:45
 */
session_start();
include ('../../books/common/db.php');
if(isset($_POST['submit'])){
    $title=$_POST['tle'];
    $content=$_POST['nav'];
    $t=time();
    $user=$_SESSION['user'];
    $sql="insert into book_news (tle,nav,user,time) value ('$title,'$content','$user','$time')";
    $result=$mysqli->query($sql);
    $num=mysqli_num_rows($result);
    if($num==0){
        echo "no suc";
    }else{
        echo "yes";
    }
}else{
    echo "error";
}



