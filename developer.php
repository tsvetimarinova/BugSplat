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
$db = new mysqli (
    "us-cdbr-azure-west-c.cloudapp.net",
    "b4bbf8767a3b3c",
    "7ae9ed4b",
    "databasebug1300608"
);

session_start();
$userid = $_SESSION ['id'];
$user = "SELECT * FROM users WHERE userID = '".$userid."'";
$res = $db->query($user);
if (!$res) die ("Could not query: " . mysqli_error($db));
while ($user1 = mysqli_fetch_assoc($res)) {
    echo "<br />";
    echo 'Name: ' . $user1 ['name'];
    echo "<br />";
    echo 'Email: ' . $user1 ['email'];
    echo "<br />";
    echo 'Country: ' . $user1 ['country'];
    echo "<br />";
}

$query2 = "SELECT bug_name FROM bugs, users WHERE bugs.userID = users.userID AND users.userID = '".$userid."'";
// execute the SQL query
$result2 = $db->query($query2);
if(!$result2) die ("Could not query: " . mysqli_error($db));
while ($bug = mysqli_fetch_assoc($result2)){
    echo '<a href="http://bughelp.azurewebsites.net/bug_template_page.php?name='.$bug['bug_name'].'">'.$bug['bug_name'].'</a>';
    echo "<br />";
    $_SESSION ['name'] = $bug['bug_name'];
}


?>