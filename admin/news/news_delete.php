<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/5
 * Time: 11:15
 */
include('../../books/common/db.php');
$id=$_GET['id'];
$sql="DELETE FROM book_news WHERE id='$id'";
$result=$mysqli->query($sql);
if(isset($result)){
    $mysqli->close();
    header("location:news.php");
}else{
    echo "no error!!";
}