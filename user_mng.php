<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>News Center---User Panel</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <?php if(!empty($uname)) { ?>
        <label>Welcome, <?php echo $uname ?> | </label>
        <a href="./?action=user_acc&uid=<?php echo $uid; ?>&uname=<?php echo $uname; ?>">Account</a>|
        <a href="./?action=log_out">Log Out</a>
        <?php } else {?>
        <a href="./?action=login">LOGIN</a>&nbsp;<label>or</label>&nbsp;<a href="./?action=register">CREATE AN ACCOUNT</a>
        <?php } ?><br><br><br>
        <a href="?action=view_pro&uid=<?php echo $uid; ?>">Your Profile</a><br>
        <a href="?action=view_rel&uid=<?php echo $uid; ?>&uname=<?php echo $uname; ?>">Your Releases</a><br>
        <?php if(isset($_SESSION['is_admin'])) { ?>
        <a href="?action=admin_users">Admin Users</a>
        <?php } ?>
        <form>
            <input type="hidden" name="action" value="news_lists">
            <input type="submit" value="Home">
        </form>
    </body>
</html>
