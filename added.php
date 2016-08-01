<div class="container">
    <li class="active"><a href = "http://bughelp.azurewebsites.net/Home.php"> Home Page </a></li>
    <li class="active"><a href = "http://bughelp.azurewebsites.net/bugs_page.php"> Bugs Page </a></li>
</div>
<div class="container">
    <li class="active"><a href = "http://bughelp.azurewebsites.net/search.php"> Search Page </a></li>
    <br />
    <br />
    <br />
</div>


<?php
session_start();
$db = new mysqli (
    "us-cdbr-azure-west-c.cloudapp.net",
    "b4bbf8767a3b3c",
    "7ae9ed4b",
    "databasebug1300608"
);
$bugname2 =  $_SESSION['bugname1'];
$bugid = "SELECT bugID FROM bugs WHERE bug_description = '".$bugname2."'";
$res_bug = $db->query($bugid);
if (!$res_bug) die ("Could not query: " . mysqli_error($db));
$date = date("Y-m-d");
echo 'Your bug is added to the database.';


$randomcom = "INSERT INTO comments VALUES (NULL, 'I have the same problem', '".$date."',1 ,'".$bugid."' )";
$resultrandom = $db->query($randomcheck);
if (!$resultrandom) die ("Could not query: " . mysqli_error($db));


$result->close();
// close connection to database
$db->close();
?>