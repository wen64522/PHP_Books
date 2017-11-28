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
    <div id="content"></div>
    <div id="foot">
        <p>welcome to my books,thanks!</p>
        <p>by @wenyiwen</p>
    </div>
</div>
</body>
</html>