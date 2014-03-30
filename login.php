<?php
if(!isset($uname)){
    $uname='';
}
if(!isset($pwd)){
    $pwd='';
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
        <title>News Center---Login</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h1>Log In</h1>
        <form action="./" method="post">
            <input type="hidden" name="action" value="login_confirm">
            <label>User Name:</label>
            <input type="text" name="uname" value="<?php echo $uname; ?>">
            <label>Password:</label>
            <input type="password" name="pwd" value="<?php echo $pwd; ?>"><br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>
