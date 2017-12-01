<?php
date_default_timezone_set("PRC");
include('books/page.php');
$sql = "select * from book_message order by id desc LIMIT $offset,$pageSize";
$result = $mysqli->query($sql);
while($arr = mysqli_fetch_array($result)){
    $rows[]=$arr;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> welcome to my books</title>
    <link rel="stylesheet" href="public/css/mystyle.css" type="text/css" >
    <script type="text/javascript" src="public/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="public/js/index.js"></script>
</head>
<body>
<div id="main">
    <div id="header">
        <div id="logo"><div id="logo_1">Books</div></div>
        <div id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Life</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">photo</a></li>
                <li><a href="#">message</a></li>
            </ul>
        </div>
        <div id="login">
            <a href="books/login.php" >Admin Login</a>
        </div>
    </div>
    <div id="message">
        <form id="form" method="post" action="books/insert.php">
            <label for="name">Your name:</label> <br>
            <input id="name" name="user" type="text" ><br>
            <label for="mess">You must want to say something,Please input your message,thanks!!! </label><br>
            <textarea id="mess" name="message" ></textarea><br>
            <input id="send" type="submit" value="sand" >
        </form>
    </div>
    <div id="content">
        <?php
          foreach($rows as $row){
              $t=date("Y/m/d H:i:s",$row['time']);
            ?>
            <div class="con_class">
            <p><?php echo "@".$row['user'] ?> said:</p>
            <p><?php echo $row['message'] ?></p>
            <p>Date:<?php echo $t ?></p>
            </div>
       <?php
        }
        ?>
        <?php
        echo "<div id='type'>";
        echo "<a href=\"".$_SERVER['PHP_SELF']."?page=1\">Home </a>";
        echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$prev."\"> 《—Last Page</a>";
        echo "|";
        echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$next."\">Next Page—》</a>";
        echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$totalPageCount."\"> End </a>";
        echo "</div>";
        ?>
    </div>
    <div id="foot">
        <p>welcome to my books,thanks!</p>
        <p>by @wenyiwen</p>
    </div>
</div>
</body>
</html>