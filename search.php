<?php
session_start();
if (isset($_POST['bttS'])){
    require 'connect.php';
    $search = $_POST ['search'];
    $ser = mysqli_query ($con, 'select * from bugs, tags where tag_description = "help" and tags.bugID = bugs.bugID');
    if (mysqli_num_rows($result)==1){
        $_SESSION['search'] = $search;
        header('Location: bug_template_page.php');
    }
    else echo "No match found.";
}



?>

<html>

<form method="post">
    <fieldset>
        <legend>Search:</legend>
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

</html>