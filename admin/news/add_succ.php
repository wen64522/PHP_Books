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
    $type=$_POST['value'];
    $t=time();
    $user=$_SESSION['user'];
    $sql="insert into book_news (tle,nav,user,time,newstype,img) value ('$title,'$content','$user','$time','$type')";
    $result=$mysqli->query($sql);
    $num=mysqli_num_rows($result);
    if($num==0){
        echo "no suc<br>";
        echo "<a href='addnews.php'>back add_type</a>";
    }else{
        echo "yes<br>";
        echo "<a href='addnews.php'>back add_type</a>";
    }
}else{
    echo "error<br>";
    echo "<a href='addnews.php'>back add_type</a>";
}



