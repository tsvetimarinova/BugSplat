
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
            <tr>
                <td></td>
                <td><input type="submit" name="bttAdd" value="Add"></td>
            </tr>

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
    $id = $_SESSION['id'];
    $tagdescription = $_SESSION['tagname'];

    $tagname = "SELECT * FROM tags WHERE tag_description = '".$tagdescription."'";
    $tag_res = $db->query($tagname);
    if (!$tagname) die ("Could not query: " . mysqli_error($db));
    while ($tag471 = mysqli_fetch_assoc($tagname)){
        $tagID = $tag471['tagID'];
        echo $tagID;
    }


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

