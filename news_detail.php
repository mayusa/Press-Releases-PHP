<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>News Center---Details</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <?php if(!empty($_SESSION['username'])) { ?>
        <label>Welcome, <?php echo $uname ?> | </label>
        <a href="./?action=user_acc&uid=<?php echo $uid; ?>&uname=<?php echo $uname; ?>">Account</a>|
        <a href="./?action=log_out">Log Out</a>
        <?php } else {?>
        <a href="./?action=login">LOGIN</a>&nbsp;<label>or</label>&nbsp;<a href="./?action=register">CREATE AN ACCOUNT</a>
        <?php } ?>
        <br><br><br>
        <h1><?php echo $news['headline']; ?></h1>
        <h5><?php echo $result['uname']. '     ' . $news['release_date']; ?></h5>
        <h3><?php echo $news['summary']; ?></h3><br>
        <p><?php echo $news['news_body'] ?></p><br>
        <h5><?php echo $news['com_name']; ?></h5>
    </body>
</html>
