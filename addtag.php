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

<form method="post">
    <fieldset>
        <legend>Step 1: Please create a tag first: </legend>
        <table cellpadding="2" cellspacing="2" border="0">
            <tr>
                <td>Tag:</td>
                <td><input type="text" name="tag"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="bttTag" value="Create tag"></td>
            </tr>
        </table>
    </fieldset>
</form>



<?php

session_start();

$db = new mysqli (
    "us-cdbr-azure-west-c.cloudapp.net",
    "b4bbf8767a3b3c",
    "7ae9ed4b",
    "databasebug1300608"
);


if (isset($_POST['bttTag'])) {

    $tag = $_POST['tag'];



    $inserttag = "INSERT INTO tags VALUES (NULL, '" . $tag . "')";
    $resulttag = $db->query($inserttag);
    if (!$resulttag) die ("Could not query: " . mysqli_error($db));
    echo 'Your tag is added to the database.';
    echo '<br />';
    echo '<a href="http://bughelp.azurewebsites.net/addbug.php">Next Step</a>';
    $_SESSION['tagname'] = $tag;

}


?>
<form method="post">
        <table cellpadding="2" cellspacing="2" border="0">
            <tr>
                <td><input type="submit" name="bttBack" value="Go Back"></td>
            </tr>
        </table>
</form>
