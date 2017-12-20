<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/4
 * Time: 15:47
 */
include ('../../include.php');
if(isset($_POST['submit'])){
    $null=$_POST['newstype'];
    if(!$null==""){
        $type['newstype']=$_POST['newstype'];
        $result=insert("book_type",$type);
        if($result){
            echo "<a href='addtype.php'>back add_type</a>";
            echo "<p>add type succ</p>";
        }else{
            echo 'error!!';
        }
    }else{
        echo "<a href='addtype.php'>back add_type</a>";
        echo "<p>please input your type!!!</p>";
    }
}else{
    echo "error";
}