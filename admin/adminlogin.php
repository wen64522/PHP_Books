<?php
session_start();
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/11/29
 * Time: 14:41
 */
include ('../books/db.php');
if(isset($_POST["submit"]) && $_POST["submit"] == "login") {
    $user=$_POST['admin'];
    $pass=$_POST['password'];
    if($user=="" or $pass=="" ){
        echo "error!!!user or password must"."<br><a href='../books/login.php'>back login</a>";
    }else{
        $sql="select admin,password from book_admin where admin='$_POST[admin]' and password='$_POST[password]'";
        $result=$mysqli->query($sql);
        $num=mysqli_num_rows($result);
        if($num){
            $_SESSION["user"]=$_POST['admin'];
            header('location:admin.php');
        }else{
            echo "user or password error!!!"."<br><a href='../books/login.php'>back login</a>";
        }
    }

}else{
    echo "submit error!!"."<br><a href='../books/login.php'>back login</a>";
}


