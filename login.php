<?php
session_start();
if (isset($_POST['bttLogin'])){
    require 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($con, 'select * from users where username = "'.$username.'" and password="'.$password.'"');
    if (mysqli_num_rows($result)==1){
        $_SESSION['username'] = $username;
        header('Location: home_page.html');
    }
    else echo "Account is invalid";
}
?>


<form method="post">
    <table cellpadding="2" cellspacing="2" border="1">
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="bttLogin" value="Login"></td>
        </tr>
    </table>
</form>



<form method="post">
    <table cellpadding="2" cellspacing="2" border="1">
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Full name:</td>
            <td><input type="text" name="fullname"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Country:</td>
            <td><input type="text" name="country"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="bttLogin" value="Register"></td>
        </tr>
    </table>
</form>