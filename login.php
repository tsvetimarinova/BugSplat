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

if (isset($_POST['bttReg'])){
    require 'connect.php';
    $username1 = $_POST['username1'];
    $result2 = mysqli_query($con, 'select * from users where username = "'.$username1.'"');
    if (mysqli_num_rows($result2)==1 ){
        echo "Username already exists.";
    } else {
        $password1 = $_POST['password1'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $result1 = mysqli_query($con, 'insert into users (userID, name, email, country, developer, privID, username, password) values("U007", ' . $fullname . ',' . $email . ',' . $country . ',"1", "PR01", ' . $username1 . ', ' . $password1 . ' )');
        $_SESSION['username1'] = $username1;
        header('Location: home_page.html');
    }
}
?>


<form method="post">
    <fieldset>
        <legend>Log in:</legend>
    <table cellpadding="2" cellspacing="2" border="0">
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
    </fieldset>
</form>



<form method="post">
    <fieldset>
        <legend>Register:</legend>
    <table cellpadding="2" cellspacing="2" border="0">
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username1"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password1"></td>
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
            <td><input type="submit" name="bttReg" value="Register"></td>
        </tr>
    </table>
    </fieldset>
</form>