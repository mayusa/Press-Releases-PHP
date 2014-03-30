<?php
if(!isset($uname)){
    $uname = '';
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>News Center</title>
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
        <h1>Recently News</h1>
        <br>
        <table class="list">
            <thead>
                <tr>
                    <th>NID</th><th>HEADLINE</th><th>SUMMARY</th><th>COMPANY NAME</th><th>DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($news)){foreach ($news as $result) :?>
                <tr>
                    <td id="<?php echo $result['nid'];?>"><?php echo $result['nid']; ?></td>
                    <td style="width: 50%"><a href="?action=news_details&nid=<?php echo $result['nid']; ?>" target="_blank"><?php echo $result['headline']; ?></a></td>
                    <td><?php echo $result['summary']; ?></td>
                    <td><?php echo $result['com_name']; ?></td>                  
                    <td><?php echo $result['release_date']; ?></td>
                </tr>
                <?php endforeach;} else {echo 'no value';} ?>
            </tbody>
        </table>
        <br><br><br>
        <form action="./" method="post">
            <label>Search By:&nbsp;</label>
            <input type="text" name="title">
            <select name="type">
                <option value="0">All</option>
                <option value="1">News Body</option>
                <option value="2">City</option>
                <option value="3">State</option>
                <option value="4">Country</option>
            </select>
            <input type="submit" value="Go">
            <input type="hidden" name="action" value="search_news">
        </form>
    </body>
</html>
