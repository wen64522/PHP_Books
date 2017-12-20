<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/7
 * Time: 10:05
 */
include ('../../include.php');
if(isset($_POST['submit'])){
    $type=$_POST['phototype'];
    if($type!==""){
        $array=array(
            'phototype'=>$_POST['phototype']
        );
        $result=insert("book_phototype",$array);
        if($result){
            echo "<a href='add_photo_type.php'>back add_type</a>";
            echo "<p>add type succ</p>";
        }else{
            echo 'error!!!';
        }

    }else{
        echo "<a href='add_photo_type.php'>back add_type</a>";
        echo "<p>please input your type!!!</p>";
    }
}else{
    echo "error";
}