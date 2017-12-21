<?php
include ('../../include.php');
$cunt=backNum("book_phototype");
$page=new Page($cunt,12);
$sql="select * from book_phototype $page->limit";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../../public/css/book_photo.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/newspage.css">
</head>
<body>
<div id="main">
    <?php
    $rows=getAllResult($sql);
    foreach($rows as $row){
    ?>
    <div class="img">
            <img  style="width: 200px ;margin: 5px"  src="../../public/uploads/photo/u=220424758,3218730757&fm=27&gp=0.jpg">
            <a href="../show/show_photo.php?phototype=<?php echo $row['phototype']?> " target="_blank"><h2 style="text-align: center;"><?php echo $row['phototype']?></h2></a>
    </div>
    <?php }?>
    <?php
    echo $page->fpage();
    ?>
</div>
</body>
</html>