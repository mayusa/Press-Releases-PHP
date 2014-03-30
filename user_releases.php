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
                <tr><h1>Your Releases</h1></tr>
                <tr>
                    <th>NID</th><th>HEADLINE</th><th>COMPANY NAME</th><th>AUTHOR</th><th>DATE</th><th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($results)) {foreach ($results as $result) :?>
                <tr>
                    <td id="<?php echo $result['nid'];?>"><?php echo $result['nid']; ?></td>
                    <td style="width: 50%"><a href="?action=news_details&nid=<?php echo $result['nid']; ?>" target="_blank"><?php echo $result['headline']; ?></a></td>
                    <td><?php echo $result['com_name']; ?></td>
                    <td><?php echo $result['uid']; ?></td>
                    <td><?php echo $result['release_date']; ?></td>
                    <td><a href="?action=edit_rel&nid=<?php echo $result['nid']; ?>&uname=<?php echo $uname; ?>">Edit</a>|
                        <a href="?action=del_rel&nid=<?php echo $result['nid']; ?>&uid=<?php echo $uid;?>&uname=<?php echo $uname;?>">Delete</a></td>
                </tr>
                <?php endforeach; }?>
                <tr><td><a href="?action=news_form&uid=<?php echo $uid; ?>&uname=<?php echo $uname; ?>">ADD</a></td></tr>
            </tbody>
        </table>
        
        <form>
            <input type="hidden" name="action" value="news_lists">
            <input type="submit" value="Home">
        </form>
    </body>
</html>
