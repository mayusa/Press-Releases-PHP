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
            <table class="list">
            <thead>
                <tr><h1>User List</h1></tr>
                <tr>
                    <th>UID</th><th>NAME</th><th>CITY</th><th>STATE</th><th>COUNTRY</th><th>IS_ADMIN</th><th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($results)) {foreach ($results as $result) : ?>
                <tr>
                    <td><?php echo $result['uid']; ?></td>
                    <td><?php echo $result['uname']; ?></td>
                    <td><?php echo $result['city']; ?></td>
                    <td><?php echo $result['state']; ?></td>
                    <td><?php echo $result['country']; ?></td>
                    <td><input type="text" readonly name="is_admin" value="<?php if($result['is_admin']){echo 'Yes';} else {echo 'No';}?>"></td>
                    <td><a href="?action=udt_user&uuid=<?php echo $result['uid']; ?>">Change Authority</a>
                        <?php echo '|'; if($result['is_admin'] != 1) {?><a href="?action=del_user&uuid=<?php echo $result['uid']; ?>&uname=<?php echo $uname; ?>">Delete</a><?php } ?></td>
                </tr>
                <?php endforeach; }?>
            </tbody>
        </table>
        
        <form>
            <input type="hidden" name="action" value="news_lists">
            <input type="submit" value="Home">
        </form>
    </body>
</html>
