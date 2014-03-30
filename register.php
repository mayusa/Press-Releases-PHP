<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>News Center---Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <form action="./" method="post">
            <table>
                <thead><tr><h1>Registration</h1></tr></thead>
            <tbody>
                <tr>
                    <th>USERNAME<label style="color:#FF0000">*</label></th>
                    <td><input type="text" name="uname" maxlength="15"></td>
                </tr>
                <tr>
                    <th>PASSWORD<label style="color:#FF0000">*</label></th>
                    <td><input type="text" name="pwd" maxlength="10"></td>
                </tr>
                <tr>
                    <th>CITY<label style="color:#FF0000">*</label></th>
                    <td><input type="text" name="city" maxlength="20"></td>
                </tr>
                <tr>
                    <th>STATE<label style="color:#FF0000">*</label></th>
                    <td><input type="text" name="state" maxlength="20"></td>
                </tr>
                <tr>
                    <th>COUNTRY</th>
                    <td><input type="text" name="country" maxlength="20"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="submit"></td>
                    <td><input type="hidden" name="action" value="sub_reg"></td>
                </tr>
            </tbody>
            </table>
        </form>
    </body>
</html>
