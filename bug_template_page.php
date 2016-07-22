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
    <li class="active"><a href = "http://bughelp.azurewebsites.net/Home_page.html"> Home Page </a></li>
    <li class="active"><a href = "http://bughelp.azurewebsites.net/bugs_page.php"> Bugs Page </a></li>
</div>



<?php

//if ($_GET['bugs_page']== $var){
// echo "link 1";
//  } else {
//      echo "link 2";
//  }



    // Retrieve the URL variables (using PHP).
$name = $_GET['name'];
echo $name;



$query = "SELECT name,email, country FROM users, bugs WHERE bug_name = '".$name."' AND users.userID = bugs.userID";
// execute the SQL query
$result = mysql_query($query);
if(!$result) die ("Could not query: " . mysql_error());
$rows = mysql_num_rows($result);
echo $rows;
/*for($i = 0; $i < $rows; ++$i) {
    echo 'name: ' . mysql_result($result, $i, 'name') . '</br>';
    echo 'email: ' . mysql_result($result, $i, 'email') . '</br>';
    echo 'country: ' . mysql_result($result, $i, 'country') . '</br>';
}*/


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