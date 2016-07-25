

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Welcome to BugSplat</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>



</head>

<body>

<?php
$result3 = mysql_query ('SELECT * FROM bugs ORDER BY bugID ');
echo $result3;
if (!$result3) die ("Could not query: " . mysql_error());
?>


<div class="container">

    <div class="starter-template">
        <h1>Welcome to BugSplat</h1>
    </div>
</div><!-- /.container -->


<div class="container">
    <li class="active"><a href = "http://bughelp.azurewebsites.net/bugs_page.php"> Bugs Page </a></li>
    <!-- <li><a href = "http://webappcw.azurewebsites.net/AdventurePage.php"> Adventure Page </a></li>
     <li><a href = "http://webappcw.azurewebsites.net/QueryTest.php"> Hyperlink - QT - </a></li> -->
</div>


<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>