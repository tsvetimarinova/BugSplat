<?php

// connect to your Azure server and select database (remember you connection details are all on the azure portal
//$db = new mysqli(
// "eu-cdbr-azure-west-c.cloudapp.net",
//"befd2db9fe76ad",
// "5a698004",
// "WebApp_Coursework"
//);
// test if connection was established, and print any errors
//if($db->connect_error){
//    die("Connection failed: " . $conn->connect_error);
//}

/*$db_database = 'databasebug1300608';
$db_hostname = 'us-cdbr-azure-west-c.cloudapp.net';
$db_username = 'b4bbf8767a3b3c';
$db_password = '7ae9ed4b';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MYSQL: ". mysql_error());
mysql_select_db($db_database)or die("Unable to connect to database: " . mysql_error());
*/
?>
<html>
<body>

<div class="container">
    <li class="active"><a href = "http://bughelp.azurewebsites.net/Home_page.html"> Home Page </a></li>
    <li class="active"><a href = "http://bughelp.azurewebsites.net/bugs_page.php"> Bugs Page </a></li>
</div>


<form>
    <fieldset>
        <legend>Please leave a comment...</legend>
        <textarea name="comments" cols="45" rows="5"></textarea>
        <br>
        <input type="submit" value="Comment" />
    </fieldset>
</form>

<?php

//if ($_GET['bugs_page']== $var){
// echo "link 1";
//  } else {
//      echo "link 2";
//  }



    // Retrieve the URL variables (using PHP).
    //$name = $_GET['name'];
    //$name = $_SESSION [$name];

    session_start();
    //echo 'Welcome '.$_SESSION[$name];
    //echo $name;
if (isset($_GET['name'])) {
    require 'connect.php';
    $name = $_GET['name'];
    echo $name;
    $result1 = mysqli_query($con, 'select * from bugs, users where bug_name = "'.$name.'" and users.userID = bugs.userID');
// execute the SQL query
//$result = mysql_query($query);
    if (!$result1) die ("Could not query: " . mysql_error());
    echo $rows;
    $rows = mysql_num_rows($result1);
//echo $rows;
    for ($i = 0; $i < $rows; ++$i) {
        echo 'name: ' . mysql_result($result1, $i, 'name') . '</br>';
        echo 'email: ' . mysql_result($result1, $i, 'email') . '</br>';
        echo 'country: ' . mysql_result($result1, $i, 'country') . '</br>';
    }


    $com = mysql_query("SELECT * FROM comments, bugs WHERE bug_name = 'Accidental semicolon' AND comments.bugID = bugs.bugID");
    if (!$com) die ("Could not query: " . mysql_error());
    $rows1 = mysql_num_rows($com);
    for ($i = 0; $i < $rows1; ++$i) {
        echo 'Comment: ' . mysql_result($com, $i, 'com_description') . '</br>';
    }
}

/*$query = "SELECT * FROM bugs";
// execute the SQL query
$result = mysql_query($query);
if(!$result) die ("Could not query: " . mysql_error());
$rows = mysql_num_rows($result);
for($j = 0; $j < $rows; ++$j)
{
    echo ' ' . mysql_result($result, $j, 'bug_name' ) . '</br>';
    echo \n;
    // echo 'Description: ' . mysql_result($result, $j, 'bug_description') . '</br>';
}
// iterate over $result object one $row at a time
// use fetch_array() to return an associative array
//while($row = $result->fetch_array()){
//  // print out fields from row of data
//echo $row ;
//}
//
*/
$result->close();
// close connection to database
$db->close();

?>






</body>
</html>

