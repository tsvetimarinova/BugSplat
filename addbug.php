
<form method="post">
    <fieldset>
        <legend>Add Bug</legend>
        <table cellpadding="2" cellspacing="2" border="0">
            <tr>
                <td>Bug name:</td>
                <td><input type="text" name="bugname"></td>
            </tr>
            <tr>
                <td>Bug description:</td>
            </tr>
        </table>

        <textarea name="description" cols="38.5" rows="5">

        </textarea>
        <table cellpadding="2" cellspacing="2" border="0">
            <tr>
                <td>Tag:</td>
                <td><input type="text" name="tag"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="bttAdd" value="Add"></td>
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


if (isset($_POST['bttAdd'])) {

    $bug_name = $_POST['bugname'];
    $description = $_POST['description'];
    $tag = $_POST['tag'];
    $id = $_SESSION['id'];
    echo $bug_name;
    echo $description;
    echo $tag;
    echo $id;

    $inserttag = "INSERT INTO tags VALUES (NULL, '".$tag."')";
    $resulttag = $db->query($inserttag);
    if (!$resulttag) die ("Could not query: " . mysqli_error($db));
    echo 'Your tag is added to the database.';
    $tagname = "SELECT * FROM tags WHERE tag_description = '".$tag."'";
    echo $tagname;

    //$insert5 = "INSERT INTO bugs (bug_name, bug_description, userID, tagID) VALUES ('".$bug_name."', '".$description."', '".$id."', '".$tag."')";
    //$insert5 = "insert into bugs values (NULL, '".$bug_name."', '".$description."', '".$id."', '".$tag."')";
    //$result5 = $db->query($insert5);
    //if (!$result5) die ("Could not query: " . mysqli_error($db));
    //echo 'Your bug is added to the database.';

}

$result->close();
// close connection to database
$db->close();
?>

