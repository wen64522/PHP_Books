
<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/11/28
 * Time: 11:36
 */
include ('db.php');
$name=$_POST['user'];
$mess=$_POST['message'];
$time=time();
if($name=="" or $mess==""){
    echo "error!!!the name or mess is null"."</br><a href=\"index.php\">back my home</a>";
}else{
    $sql="INSERT INTO book_message(user,message,time) VALUE ('$name','$mess','$time')";
    $mysqli->query($sql);
    $mysqli->close();
    header('Location:index.php');
}


