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
        <form>
            <table>
                <thead><tr><h1>Your Profile</h1></tr></thead>
                <tbody>
                <tr>
                    <th>CITY:</th>
                    <td><?php echo $city; ?></td>
                </tr>
                <tr>
                    <th>STATE:</th>
                    <td><?php echo $state; ?></td>
                </tr>
                <tr>
                    <th>COUNTRY:</th>
                    <td><?php echo $cty; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="?action=edit_pro&uid=<?php echo $uid; ?>" target="_blank">Edit</a></td>
                </tr> 
                </tbody>
            </table>
        </form>
        
        <form>
            <input type="hidden" name="action" value="news_lists">
            <input type="submit" value="Home">
        </form>
    </body>
</html>
