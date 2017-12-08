<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/8
 * Time: 15:38
 */
include('../../books/common/db.php');
$id=$_GET['id'];
$sql="DELETE FROM book_photo WHERE id='$id'";
$result=$mysqli->query($sql);
if(isset($result)){
    $mysqli->close();
    header("location:photo.php");
}else{
    echo "error!!";
}