<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/1
 * Time: 9:57
 */
include ('../../books/db.php');
$id=$_GET['id'];
$sql="DELETE FROM book_message WHERE id='$id'";
$result=$mysqli->query($sql);
if(isset($result)){
    $mysqli->close();
    header("location:message.php");
}else{
    echo "no error!!";
}