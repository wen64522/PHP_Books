<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/4
 * Time: 15:47
 */
include ('../../books/common/db.php');
if(isset($_POST['submit'])){
    $type=$_POST['newstype'];
    if($type!==""){
        $sql="insert into book_type (newstype) value ('$type')";
        $mysqli->query($sql);
        echo "<a href='addtype.php'>back add_type</a>";
        echo "<p>add type succ</p>";
    }else{
        echo "<a href='addtype.php'>back add_type</a>";
        echo "<p>please input your type!!!</p>";
    }
}else{
    echo "error";
}