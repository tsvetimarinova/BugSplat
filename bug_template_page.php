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
    <li class="active"><a href = "http://bughelp.azurewebsites.net/Home.php"> Home Page </a></li>
    <li class="active"><a href = "http://bughelp.azurewebsites.net/bugs_page.php"> Bugs Page </a></li>
</div>
<div class="container">
    <li class="active"><a href = "http://bughelp.azurewebsites.net/search.php"> Search Page </a></li>
</div>


<form>
    <fieldset>
        <legend>Please leave a comment...</legend>
        <textarea name="comments" cols="45" rows="5"></textarea>
        <br>
        <input type="submit" value="comment" />
    </fieldset>
</form>

<?php

//if ($_GET['bugs_page']== $var){
// echo "link 1";
//  } else {
//      echo "link 2";
//  }

$db = new mysqli (
    "us-cdbr-azure-west-c.cloudapp.net",
    "b4bbf8767a3b3c",
    "7ae9ed4b",
    "databasebug1300608"
);


    // Retrieve the URL variables (using PHP).
    //$name = $_GET['name'];
    //$name = $_SESSION [$name];

    session_start();
    //echo 'Welcome '.$_SESSION[$name];
    //echo $name;
if (isset($_GET['name'])) {
    $date = date("Y-m-d");
    $comment = $_POST['comment'];
    require 'connect.php';
    $name = $_GET['name'];
    echo $name;
    //$com =  "insert into comments values ('C006', '".$comment."', '".$date."', 'U001', 'B001')";
    //$result = $db->query($com);
    //if (!$result) die ("Could not query: " . mysql_error());
    //else echo "Done!";

    //$name2 = $_SESSION['name'];
   // echo $name2;
    $query = "select * from bugs, users where bug_name = '".$name."' and users.userID = bugs.userID";
    $res = $db->query($query);
// execute the SQL query
//$result = mysql_query($query);
    if (!$res) die ("Could not query: " . mysql_error());
    //$rows = mysqli_num_rows($res);
//echo $rows;
    //echo "name: ";
    while ($bug1 = mysqli_fetch_assoc($res)) {
        // echo $bug['bug_name'] . " ";
        //echo "<br />";
        echo "<br />";
        echo $bug1 ['name'];
        echo "<br />";
        echo 'Name: ' . $bug1 ['email'];
        echo "<br />";
        echo 'Country: ' .$bug1 ['country'];
        echo "<br />";
        echo "<br />";
        echo 'Bug: ' . $bug1 ['bug_description'];

    }


    $com = "SELECT * FROM comments, bugs WHERE bug_name = '".$name." ' AND comments.bugID = bugs.bugID";
    $com_res = $db->query($com);
    if (!$com_res) die ("Could not query: " . mysql_error());
    //$rows1 = mysql_num_rows($com);
    echo "Commens: ";
    while ($com1 = mysqli_fetch_assoc($com_res)) {
        // echo $bug['bug_name'] . " ";
        //echo "<br />";
        echo "<br />";
        echo $com1 ['com_description'];
        echo "<br />";
        echo 'Date: ' . $bug1 ['com_date'];
        echo "<br />";

    }
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

