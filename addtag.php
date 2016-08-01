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
    echo '<a href="http://bughelp.azurewebsites.net/bug_template_page.php?name='.$bug['bug_name'].'">Next Step</a>';
    echo 'Your tag is added to the database.';
}


?>