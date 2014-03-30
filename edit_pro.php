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
        <form action="./" method="post">
            <table>
                <thead><tr><h1>Your Profile</h1></tr></thead>
                <tbody>
                    <tr>
                        <th>PASSWORD:</th>
                        <td><input type="text" name="pwd" value="<?php echo $pwd; ?>"></td>
                        <td><input type="hidden" name="uid" value="<?php echo $uid; ?>"></td>
                        <td><input type="hidden" name="uname" value="<?php echo $uname; ?>"></td>
                    </tr>
                <tr>
                    <th>CITY:</th>
                    <td><input type="text" name="city" value="<?php echo $city; ?>"</td>
                </tr>
                <tr>
                    <th>STATE:</th>
                    <td><input type="text" name="state" value="<?php echo $state; ?>"</td>
                </tr>
                <tr>
                    <th>COUNTRY:</th>
                    <td><input type="text" name="cty" value="<?php echo $cty; ?>"</td>
                </tr>
                <tr>
                    <td><input type="hidden" name="action" value="udt_pro"> </td>
                    <td><input type="submit" value="Update"></td>
                </tr> 
                </tbody>
            </table>
        </form>
    </body>
</html>
