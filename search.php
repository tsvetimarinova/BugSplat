<html>

<div class="container">
    <li class="active"><a href = "http://bughelp.azurewebsites.net/Home.php"> Home Page </a></li>
    <li class="active"><a href = "http://bughelp.azurewebsites.net/bugs_page.php"> Bugs Page </a></li>
    <br />
    <br />
    <br />
</div>

<form method="post">
    <fieldset>
        <legend>Search by tags:</legend>
        <table cellpadding="1" cellspacing="1" border="0">
            <tr>
                <td></td>
                <td><input type="text" name="search"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="bttS" value="Search"></td>
            </tr>
        </table>
    </fieldset>
</form>

<form method="post">
    <fieldset>
        <legend>Search by author:</legend>
        <table cellpadding="1" cellspacing="1" border="0">
            <tr>
                <td></td>
                <td><input type="text" name="search1"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="bttS1" value="Search"></td>
            </tr>
        </table>
    </fieldset>
</form>
</html>


</html>


<?php
$db = new mysqli (
    "us-cdbr-azure-west-c.cloudapp.net",
    "b4bbf8767a3b3c",
    "7ae9ed4b",
    "databasebug1300608"
);

session_start();
if (isset($_POST['bttS'])){
    require 'connect.php';
    $search = $_POST ['search'];
    $query = "select * from bugs, tags where tag_description = '".$search."' and tags.tagID = bugs.tagID";
    $result1 = $db->query($query);
    if (!$result1) echo "Error: " .mysql_error();
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "Results: ";
    echo "<br />";
    while ($tag = mysqli_fetch_assoc($result1)){
        echo '<a href="http://bughelp.azurewebsites.net/bug_template_page.php?name='.$tag['bug_name'].'">'.$tag['bug_name'].'</a>';
        echo "<br />";

    }


if (isset($_POST['bttS1'])) {
    require 'connect.php';
    $search1 = $_POST ['search1'];
    $query1 = "select * from bugs, users where users.name = '" . $search1 . "' and users.userID = bugs.userID";
    $result2 = $db->query($query1);
    if (!$result2) echo "Error: " . mysqli_error($db);
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "Results: ";
    echo "<br />";
    while ($user = mysqli_fetch_assoc($result2)) {
        echo '<a href="http://bughelp.azurewebsites.net/bug_template_page.php?name=' . $user['bug_name'] . '">' . $user['bug_name'] . '</a>';
        echo "<br />";

    }
}


}



?>

<html>



</html>