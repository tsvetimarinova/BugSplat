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
   /* if (mysqli_num_rows($result)==1){
        $_SESSION['username'] = $username;
        header('Location: home.php');
    }
    else echo "Account is invalid";*/
}


if (isset($_POST['bttReg'])){
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $insert15 = "insert into users values ('10', 'Crazy Arsonist','fire_in_da_hole@gmail.com','Pakistan','1','','','arsonist', '123456')";
    $result15 = $db->query($insert15);
    if (!$result15) echo "Error: " .mysqli_error();
    else echo "You have completed the registration! ";
    //$result2 = mysqli_query($con, 'select * from users where username = "'.$username1.'"');
   // mysqli_query ($con, 'insert into users (userID, name, email, country, developer, admin, privID, username, password) values ("", "Ivan Petrov", "vankata@abv.bg", "Bangladesh", "1", "", "vankata1", "vanka")');
    /*if (mysqli_num_rows($result2)==1 ){
        echo "Username already exists.";
    } else {
        $password1 = $_POST['password1'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $result1 = mysql_query($con, 'insert into users (userID, name, email, country, developer, admin, privID, username, password) values("U007", "'.$fullname.'", "'.$email.'","'.$country.'","1","0", "PR01", "'.$username1.'", "'.$password1.'")');
        if (!$result1) die ("Could not query: " . mysql_error());
        else echo "Success";
        mysql_close($con);
        $_SESSION['username1'] = $username1;
       // header('Location: home_page.html');
    }*/
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