<?php
date_default_timezone_set("PRC");
include ('db.php');
$sql="SELECT * FROM book_message ORDER BY id DESC";
$result=$mysqli->query($sql);
$rows=array();
while($row=$result->fetch_array(MYSQLI_ASSOC)){
    $rows[]=$row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> welcome my Book</title>
    <link rel="stylesheet" href="mystyle.css" type="text/css" >
</head>
<body>
<div id="main">
    <div id="header">
        <h1>Text</h1>
    </div>
    <div id="message">
        <form id="form" method="post" action="insert.php">
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

    </div>
    <div id="foot">
        <p>welcome to my books,thanks!</p>
        <p>by @wenyiwen</p>
    </div>
</div>
</body>
</html>