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
    $insert5 = "insert into bugs values (NULL, 'Some bug', 'This is a bug', '1', 'bug')";
    $result5 = $db->query($insert5);
    if (!$result5) die ("Could not query: " . mysqli_error());
    echo 'Your bug is added to the database.';

}

$result->close();
// close connection to database
$db->close();
?>