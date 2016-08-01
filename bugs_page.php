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

$db_database = 'databasebug1300608';
$db_hostname = 'us-cdbr-azure-west-c.cloudapp.net';
$db_username = 'b4bbf8767a3b3c';
$db_password = '7ae9ed4b';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MYSQL: ". mysql_error());
mysql_select_db($db_database)or die("Unable to connect to database: " . mysql_error());

?>
<html>
<body>

<div class="container">
    <li class="active"><a href = "http://bughelp.azurewebsites.net/Home.php"> Home Page </a></li>
</div>
<div class="container">
    <li class="active"><a href = "http://bughelp.azurewebsites.net/search.php"> Search Page </a></li>
    <li class="active"><a href = "http://bughelp.azurewebsites.net/addtag.php"> Add Bug</a></li>
</div>

<div class="container">
    <div class="starter-template">
        <h1>BUGS</h1>
    </div>
</div>

<?php
$db = new mysqli (
    "us-cdbr-azure-west-c.cloudapp.net",
    "b4bbf8767a3b3c",
    "7ae9ed4b",
    "databasebug1300608"
);
session_start();

    $query = "SELECT bug_name FROM bugs";
    // execute the SQL query
    $result = $db->query($query);
    if(!$result) die ("Could not query: " . mysql_error());
    $rows = mysql_num_rows($result);
    if (!$result) die ("Could not query: " . mysql_error());
    while ($bug = mysqli_fetch_assoc($result)){
        echo '<a href="http://bughelp.azurewebsites.net/bug_template_page.php?name='.$bug['bug_name'].'">'.$bug['bug_name'].'</a>';
        echo "<br />";
        $_SESSION ['name'] = $bug['bug_name'];
    }




$result->close();
// close connection to database
$db->close();


?>
</body>
</html>
