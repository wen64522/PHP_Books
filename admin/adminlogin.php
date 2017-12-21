<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/11/29
 * Time: 14:41
 */
include('../include.php');
if(isset($_POST["submit"]) && $_POST["submit"] == "登录") {
    $user=$_POST['admin'];
    $pass=$_POST['password'];
    $code=$_POST['authcode'];
    if($user=="" or $pass=="" or  $code=="" ){
        echo "错误！！！姓名或密码或验证码不能为空，请检查。"."<br><a href='../books/login.php'>back login</a>";
    }else if( $code==$_SESSION['authcode']){
        $sql="select admin,password from book_admin where admin='$user' and password='$pass'";
        $num=getNumResult($sql);
        if($num){
            $_SESSION["user"]=$_POST['admin'];
            header('location:admin.php');
        }else{
            echo "用户名或密码错误，请检查!!!"."<br><a href='../home/login.php'>back login</a>";
        }
    }else {
        echo "验证码有误，请检查！！！"."<br><a href='../home/login.php'>back login</a>";
    }
}else{
    echo "submit error!!"."<br><a href='../home/login.php'>back login</a>";
}


