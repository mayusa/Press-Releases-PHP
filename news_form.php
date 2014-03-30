<?php
if(!isset($headline)){
    $headline = '';
}
if(!isset($summary)){
    $summary = '';
}
if(!isset($news_body)){
    $news_body = '';
}
if(!isset($com_name)){
    $com_name = '';
}
if(!isset($com_email)){
    $com_email = '';
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head runat="server">
        <meta charset="UTF-8">
        <title>News Center---Details</title>
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
        <form action="./" method="post" runat="server">
            <table class="list">
                <thead>
                    <tr><h1>Add New Release:</h1></tr>
            </thead>
            <tbody>
                <tr>
                    <th>Headline:</th>
                    <td><input type="text" name="headline" required="required" value="<?php echo $headline; ?>"></td>
                </tr>
                <tr>
                    <th>Summary:</th>
                    <td><textarea name="summary" rows="3" required="required"><?php echo $summary; ?></textarea></td>
                </tr>
                <tr>
                    <th>Body:</th>
                    <td>
                        <script src="./nicEdit/nicEdit.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(function() {
                new nicEditor({ fullPanel: true , iconsPath : './nicEdit/nicEditorIcons.gif'}).panelInstance('txtContent');
            });
        </script>       
        <textarea runat="server" id="txtContent" 
                  name="news_body" textmode="MultiLine" cols="60" rows="50"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Company Name:</th>
                    <td><input type="text" name="com_name" required="required" value="<?php echo $com_name; ?>"></td>
                </tr>
                <tr>
                    <th>Company Email:</th>
                    <td><input type="text" name="com_email" required="required" value="<?php echo $com_email; ?>"></td>
                    <td><input type="hidden" name="uid" value="<?php echo $uid; ?>"></td>
                    <td><input type="hidden" name="uname" value="<?php echo $uname; ?>"></td>
                    
                </tr>
                <tr>
                    <?php if($choose == 0){?>
                    <td><input type="hidden" name="action" value="add_news"></td>
                    <?php } else { ?>
                    <td><input type="hidden" name="action" value="udt_news"></td>
                        <td><input type="hidden" name="nid" value="<?php echo $nid; ?>"></td><?php } ?>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </tbody>           
            </table>
        </form>
    </body>
</html>
