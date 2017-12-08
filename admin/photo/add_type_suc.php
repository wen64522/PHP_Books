<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/7
 * Time: 10:05
 */
include ('../../books/common/db.php');
if(isset($_POST['submit'])){
    $type=$_POST['phototype'];
    if($type!==""){
        $sql="insert into book_phototype (phototype) value ('$type')";
        $mysqli->query($sql);
        echo "<a href='add_photo_type.php'>back add_type</a>";
        echo "<p>add type succ</p>";
    }else{
        echo "<a href='add_photo_type.php'>back add_type</a>";
        echo "<p>please input your type!!!</p>";
    }
}else{
    echo "error";
}