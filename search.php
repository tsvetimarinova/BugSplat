<html>

<div class="container">
    <li class="active"><a href = "http://bughelp.azurewebsites.net/Home.php"> Home Page </a></li>
    <li class="active"><a href = "http://bughelp.azurewebsites.net/bugs_page.php"> Bugs Page </a></li>
</div>
</html>


<?php
session_start();
if (isset($_POST['bttS'])){
    require 'connect.php';
    $search = $_POST ['search'];
    $ser = mysqli_query ("select * from bugs, tags where tag_description = 'help' and tags.tagID = bugs.tagID");
    if (!$q) echo "Error: " .mysql_error();
    if (mysqli_num_rows($ser)==1){
        $_SESSION['search'] = $search;
        header('Location: bug_template_page.php');
    }
    //else echo "No match found.";
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