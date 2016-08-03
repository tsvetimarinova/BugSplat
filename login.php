<?php
$db = new mysqli (
    "us-cdbr-azure-west-c.cloudapp.net",
    "b4bbf8767a3b3c",
    "7ae9ed4b",
    "databasebug1300608"
);

session_start();
if (isset($_POST['bttLogin'])){
    require 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($con, 'select * from users where username = "'.$username.'" and password="'.$password.'"');
    while ($login = mysqli_fetch_assoc($result)){
        $_SESSION ['id'] = $login['userID'];
        $_SESSION['username'] = $username;
        header('Location: home.php');
    }
}


if (isset($_POST['bttReg'])){
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $insertuser = "insert into users values (NULL, '".$fullname."','".$email."','".$country."',1,NULL,NULL,'".$username1."', '".$password1."')";
    $resultuser = $db->query($insertuser);
    if (!$resultuser) echo "Error: " .mysqli_error($db);
    else echo "You have completed the registration! Please, log in now! ";
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