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


$db = new mysqli (
    "us-cdbr-azure-west-c.cloudapp.net",
    "b4bbf8767a3b3c",
    "7ae9ed4b",
    "databasebug1300608"
);


    // Retrieve the URL variables (using PHP).
    session_start();
if (isset($_GET['name'])) {
    $date = date("Y-m-d");
    $comment = $_POST['comment'];
    require 'connect.php';
    $name = $_GET['name'];
    echo $name;



    $query = "select * from bugs, users where bug_name = '".$name."' and users.userID = bugs.userID";
    $res = $db->query($query);
// execute the SQL query

    if (!$res) die ("Could not query: " . mysql_error());

    while ($bug1 = mysqli_fetch_assoc($res)) {
        echo "<br />";
        echo 'Name: ' . $bug1 ['name'];
        echo "<br />";
        echo 'Email: ' . $bug1 ['email'];
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
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "Commens: ";
    while ($com1 = mysqli_fetch_assoc($com_res)) {
        echo "<br />";
        echo $com1 ['com_description'];
        echo "<br />";
    }




    $insert_com = "insert into comments values ('C006', '".$comment."', '".$date."', '0002', '0001')";
    $result_com = $db->query($insert_com);
    if (!$result_com) die ("Could not query: " . mysql_error());
    echo 'Your comment is added to the database. Please refresh the page to see it.';
}



$result->close();
// close connection to database
$db->close();

?>






</body>
</html>

