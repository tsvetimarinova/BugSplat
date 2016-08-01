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
    /*for($i = 0; $i < $rows; ++$i){
        $var = mysql_result($result, $i, 'bug_name') . '</br>';
        //$_SESSION ['bug']= $var;
        //echo $_SESSION ['bug'];
        echo '<a href="http://bughelp.azurewebsites.net/bug_template_page.php?name='.$var.'">'.$var.'</a>';
        $_SESSION ['name'] = $var;
    }*/


   /* $var = 'Accidental semicolon';
    $b = 'Curly braces';
    echo '<a href="http://bughelp.azurewebsites.net/test.php?name='.$var.'">'.$var.'</a>';
    echo '<br/>';
    echo '<a href="http://bughelp.azurewebsites.net/test.php?name='.$b.'">Curly braces</a>';
   */
?>
<!--<div class="container">
    <div class="starter-template">

        var=10;


        <!-- Send the variables myNumber=1 and myFruit="orange" to the new PHP page...-->
        <!--<a href="http://bughelp.azurewebsites.net/test.php?var">Send variables via URL!</a>


        <!--<li><a href = "http://bughelp.azurewebsites.net/test.php"> Accidental semicolon </a></li> -->
       <!-- <li><a href = "http://bughelp.azurewebsites.net/curly_braces.php"> Curly braces </a></li>
    </div>
</div>
-->
<?php



/*$query = "SELECT * FROM bugs";
// execute the SQL query
$result = mysql_query($query);
if(!$result) die ("Could not query: " . mysql_error());
$rows = mysql_num_rows($result);
for($j = 0; $j < $rows; ++$j)
{
    // echo ' ' . mysql_result($result, $j, 'bug_name') . '</br>';
    /* echo 'Description: ' . mysql_result($result, $j, 'bug_description') . '</br>'; */
//}
// iterate over $result object one $row at a time
// use fetch_array() to return an associative array
//while($row = $result->fetch_array()){
//  // print out fields from row of data
//echo $row ;
//}
$result->close();
// close connection to database
$db->close();


?>
</body>
</html>
